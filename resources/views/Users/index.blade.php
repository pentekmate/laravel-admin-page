<x-layout>
    <div class="flex flex-col gap-4">
        <div>
            <x-card title="Current Users" :cardData='count($users)'>
            </x-card>
        </div>

        <p class="text-[24px]">Users</p>

        <x-table-component 
        :items="$users"
        :columns="[
            ['field' => 'id', 'label' => 'ID','class'=>'text-center text-[#0EA5E9] font-bold'],
            ['field' => 'name', 'label' => 'Name','class'=>'text-start ml-[35%]'],
            ['field' => 'email', 'label' => 'Email','class'=>''],
            ['field' => 'isAdmin', 'label' => 'Admin'],
            ['field' => 'has2FA', 'label' => '2FA'],
        ]"
        editRoute="users.edit"
        deleteRoute="users.destroy"
        modelName="user"
        columnWidths="50px 4fr 2fr 2fr 1fr 1fr"
        :filters="\App\Models\User::$filters"
        filterRoute="users.index"/>
    </div>
</x-layout>