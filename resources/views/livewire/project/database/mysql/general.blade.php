<div>
    <form wire:submit="submit" class="flex flex-col gap-2">
        <div class="flex items-center gap-2">
            <h2>General</h2>
            <x-forms.button type="submit">
                Save
            </x-forms.button>
        </div>
        <div class="flex gap-2">
            <x-forms.input label="Name" id="database.name" />
            <x-forms.input label="Description" id="database.description" />
            <x-forms.input label="Image" id="database.image" required
                helper="For all available images, check here:<br><br><a target='_blank' href='https://hub.docker.com/_/mysql'>https://hub.docker.com/_/mysql</a>" />
        </div>
        @if ($database->started_at)
            <div class="flex gap-2">
                <x-forms.input label="Root Password" id="database.mysql_root_password" type="password" readonly
                    helper="You can only change this in the database." />
                <x-forms.input label="Normal User" id="database.mysql_user" required readonly
                    helper="You can only change this in the database." />
                <x-forms.input label="Normal User Password" id="database.mysql_password" type="password" required
                    readonly helper="You can only change this in the database." />
                <x-forms.input label="Initial Database" id="database.mysql_database"
                    placeholder="If empty, it will be the same as Username." readonly
                    helper="You can only change this in the database." />
            </div>
        @else
            <div class="pt-8 dark:text-warning">Please verify these values. You can only modify them before the initial
                start. After that, you need to modify it in the database.
            </div>
            <div class="flex gap-2 pb-8">
                <x-forms.input label="Root Password" id="database.mysql_root_password" type="password"
                    helper="You can only change this in the database." />
                <x-forms.input label="Normal User" id="database.mysql_user" required
                    helper="You can only change this in the database." />
                <x-forms.input label="Normal User Password" id="database.mysql_password" type="password" required
                    helper="You can only change this in the database." />
                <x-forms.input label="Initial Database" id="database.mysql_database"
                    placeholder="If empty, it will be the same as Username."
                    helper="You can only change this in the database." />
            </div>
        @endif
        <div class="flex flex-col gap-2">
            <h3 class="py-2">Network</h3>
            <div class="flex items-end gap-2">
                <x-forms.input placeholder="3000:5432" id="database.ports_mappings" label="Ports Mappings"
                    helper="A comma separated list of ports you would like to map to the host system.<br><span class='inline-block font-bold dark:text-warning'>Example</span>3000:5432,3002:5433" />
                <x-forms.input placeholder="5432" disabled="{{ $database->is_public }}" id="database.public_port"
                    label="Public Port" />
                <x-forms.checkbox instantSave id="database.is_public" label="Make it publicly available" />
            </div>
            <x-forms.input label="MySQL URL (internal)"
                helper="If you change the user/password/port, this could be different. This is with the default values."
                type="password" readonly wire:model="db_url" />
            @if ($db_url_public)
                <x-forms.input label="MySQL URL (public)"
                    helper="If you change the user/password/port, this could be different. This is with the default values."
                    type="password" readonly wire:model="db_url_public" />
            @endif
        </div>
        <x-forms.textarea label="Custom Mysql Configuration" rows="10" id="database.mysql_conf" />
        <h3 class="pt-4">Advanced</h3>
        <div class="flex flex-col">
            <x-forms.checkbox helper="Drain logs to your configured log drain endpoint in your Server settings."
                instantSave="instantSaveAdvanced" id="database.is_log_drain_enabled" label="Drain Logs" />
        </div>
    </form>
</div>
