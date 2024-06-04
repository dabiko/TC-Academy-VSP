#  TC-Academy-VSP: Voting System Prototype [LARAVEL]

# Helpful Information

#### Basic Security (Some Pending Completion)
1. Only Admin users with status of 1 can see a certain navigation menu
2. The Role and Permission (*"spatie/laravel-permission": "^6.7"*) menu was to prevent 
candidates, normal users and 
other voters from carrying out certain action on the platform such as access to certain
routes without authorized access (Pending completion).I was coding with some measure of security
as the back of my mind, but time was a factor to me for this project.So it's pending completion.
3. Emails are sent to candidates only after they have completed their votes
(Voting all candidates running for the election). If a user votes counts less than
the total number of candidates running, an email will not be sent to that use till the
voting is completed.
4. I used mailtrap.io to configure my email for the mailing service.
5. A user can't vote more than one candidate running for a particular post
6. For now, access to the registration route is still open for testing. Normally, accounts
should be created by System Admins.
7. Admins have access to menus like post, candidates, role and permissions for CRUD
on the platform
8. A toast notification is sent to the user after every successful vote.

## Tech Stack Summary
1. Since laravel is a popular PHP framework and the task required its usage, I decided to explore
the Livewire framework (Jetstream). This is great as it provides modern reactive functionalities when doing 
application development.
2. All contents load with a page refresh and lazy loading and caching is integrated when navigating
from one menu to another.


