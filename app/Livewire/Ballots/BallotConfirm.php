<?php

namespace App\Livewire\Ballots;

use App\Models\Candidate;
use App\Models\Post;
use App\Models\Votes;
use App\Traits\EncryptDecrypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class BallotConfirm extends Component
{

    use EncryptDecrypt;

    #[Locked]
    public string $candidate_id;

    #[Locked]
    public string $name;

    #[Locked]
    public string $post;

    #[Locked]
    public string $post_id;

    public bool $ConfirmBallotModal = false;

    #[On('dispatch-vote-now')]
    public function set_vote($candidate_id, $name, $post, $post_id): void
    {
        $this->candidate_id = $candidate_id;
        $this->name = $name;
        $this->post = $post;
        $this->post_id = $post_id;


        $this->ConfirmBallotModal  = true;
    }


 public function voteCandidate() : void
    {
        $decrypted_candidate_id = $this->decryptId($this->candidate_id);
        $decrypted_post_id = $this->decryptId($this->post_id);

        $user_vote = Votes::where('user_id', Auth::id())
                 ->where('post_id', $decrypted_post_id)
                 ->first();

        $post_check = Post::findOrFail($decrypted_post_id);
        $candi_check = Candidate::findOrFail($decrypted_candidate_id);

        //dd($user_vote);

        if ($user_vote){
          $this->dispatch(
              'notify',
              title: 'error',
              timer: 4000,
              message:  ' '.$post_check->name.
              ' vote casted already'
          );

          $this->ConfirmBallotModal  = false;

        }else{
            $voted = Votes::updateOrCreate(
                    [
                        'candidate_id' => $decrypted_candidate_id,
                        'post_id' => $decrypted_post_id,
                        'user_id' => Auth::id()
                    ],
                    ['vote_count' => 1]
                );

        ($voted)
            ? $this->dispatch('notify', title: 'success', message:  ' '.$this->name. ' Voted Successfully')
            : $this->dispatch('notify', title: 'fail', message: 'Ops!! Something went wrong');

          $this->ConfirmBallotModal  = false;

       $this->dispatch('dispatch-ballot-casted')->to(BallotCandidates::class);
        }
    }
    public function render(): View
    {
        return view('livewire.ballots.ballot-confirm');
    }
}
