<div class="">
  <div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
         <div class="flex space-x-3 items-center">
            <label for="status" class=" text-sm font-medium text-gray-700 sm:pl-8"> Group :</label>
            <select id="status" wire:model.live="group"
                    class="mt-1 block border-gray-300 dark:border-gray-700 text-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">All</option>
                <option value="dashboard">Dashboard</option>
                <option value="candidate">Candidates</option>
                <option value="post">Posts</option>
                <option value="vote">Votes</option>
                <option value="student">Students</option>
            </select>
        </div>
      <div class="overflow-hidden sm:px-6 lg:px-8">
          @if(count($permissions) > 0)
          <table
          class="min-w-full text-center text-sm font-light text-surface">
              <thead
                class="border-b border-neutral-200 font-medium dark:border-white/10">
                <tr>
                   @include('livewire.partials.sortable-th', [
                          'columnName' => 'name',
                          'displayName' => 'Name'

                        ])

                        @include('livewire.partials.sortable-th', [
                          'columnName' => 'group_name',
                          'displayName' => 'Group'

                        ])

                        @include('livewire.partials.sortable-th', [
                           'columnName' => 'user_id',
                           'displayName' => 'Creator'

                         ])

                        @include('livewire.partials.sortable-th', [
                          'columnName' => 'updated_by',
                          'displayName' => 'Updater'

                        ])

                        @include('livewire.partials.sortable-th', [
                          'columnName' => 'created_at',
                          'displayName' => 'Create Date'

                        ])

                        @include('livewire.partials.sortable-th', [
                          'columnName' => 'updated_at',
                          'displayName' => 'Last Update'

                        ])
                  <th scope="col" class="px-6 py-3.5 text-left text-sm font-semibold text-gray-700">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
              @foreach ($permissions as $key => $permission)
                   <tr wire:key.live="{{$permission->id}}" class="border-b border-neutral-200 dark:border-white/10">

                       <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                <x-button class="px-3 py-1 hover:bg-indigo-700  bg-indigo-500 text-white rounded">
                                    {{ $permission->id }}
                                </x-button>
                       </td>
                       <td class="whitespace-nowrap px-6 py-4">
                           {{ $permission->name }}
                       </td>

                       <td class="whitespace-nowrap px-6 py-4">
                           {{ $permission->user->name }}
                       </td>

                       <td class="whitespace-nowrap px-6 py-4">
                           {{ empty(!$permission->updated_by) ? $permission->user->name : 'No Updates' }}
                       </td>

                       <td class="whitespace-nowrap px-6 py-4">
                           {{ $permission->created_at }}
                       </td>

                       <td class="whitespace-nowrap px-6 py-4">
                          {{ $permission->updated_at }}
                       </td>

                       <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">
                                    <x-button @click="$dispatch('dispatch-view-permission', { id: '{{ $permission->id }}' })" class="px-3 py-1 hover:bg-indigo-700 bg-indigo-500 text-white rounded">
                                        <i class='far fa-eye'></i>
                                    </x-button> &ensp;

                                    <x-button @click="$dispatch('dispatch-edit-permission', { id: '{{ $permission->id }}' })" class="px-3 py-1 hover:bg-indigo-700 bg-indigo-500 text-white rounded">
                                        <i class='far fa-edit'></i>
                                    </x-button>&ensp;

                                    <button @click="$dispatch('dispatch-delete-permission', { id: '{{ Crypt::encryptString($permission->id) }}', name: '{{$permission->name}}' })" class="px-3 py-1 bg-red-600 dark:bg-red-700 text-white rounded">
                                        <i class='far fa-trash-alt'></i>
                                    </button>
                       </td>
                   </tr>
              @endforeach
              </tbody>
           </table>
          @else
          <table
              class="min-w-full text-left text-sm font-light text-surface">
              <thead
                class="border-b border-neutral-200 font-medium dark:border-white/10">
                <tr>
                        <th scope="col"
                            class="px-6 py-4">
                            #No
                        </th>
                        <th scope="col"
                            class="px-6 py-4">
                            #ID
                        </th>
                        <th scope="col"
                            class="px-6 py-4">
                            Name
                        </th>

                         <th scope="col" class="px-6 py-4">
                            Group Name
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Creator
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Updated By
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Create Date
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Last Update
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Actions
                        </th>
                    </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
              <tr>
                        <td colspan="100%" style="text-align: center;">
                            <div class="alert py-5 alert-primary text-gray-700" role="alert">
                                <i data-feather="alert-circle"></i>
                                <strong class="text-indigo-500">Oops No Data Available!!! </strong>
                            </div>
                        </td>
                    </tr>
              </tbody>
          </table>
          @endif
      </div>
        <div class="mt-5 mb-2 text-gray-700 dark:text-white">
            <div class="flex">
                <div class="flex space-x-2 items-center mb-3">
                    <label for="per_page" class="w-32 text-sm font-medium text-gray-700">Per Page</label>
                    <select id="per_page" wire:model.live="per_page"
                            class="mt-1 block w-full border-gray-300 text-gray-700 dark:border-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            {{ $permissions->links() }}
        </div>
    </div>
  </div>
</div>
</div>
