<x-guest-layout>
    <h1>Welcome!</h1>

    <ul>
        <li>
            <Link href="/?noToast=true">Home</Link>
        </li>
        <li>
            <Link href="/">Toast</Link>
        </li>
        <li>
            <Link href="/?type=danger">Danger toast</Link>
        </li>
        <li>
            <Link href="/?type=warning">Warning toast</Link>
        </li>
        <li>
            <Link href="/?leftTop=true">Left top toast</Link>
        </li>
        <li>
            <Link href="/?center=true">Center toast</Link>
        </li>
        <li>
            <Link href="/?backdrop=true">Backdrop toast</Link>
        </li>
    </ul>


    <x-splade-lazy style="text-align: center;;">
        <x-slot:placeholder> The items are loading... </x-slot:placeholder>

        <ul>
        @foreach($items as $item)
            <li>{{data_get($item, 'name')}}</li>
        @endforeach
        </ul>
    </x-splade-lazy>

    <div>
        <x-splade-toggle>
            <button class="bg-transparent hover:bg-blue-900 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click.prevent="toggle">
                Toggle items
            </button>

            <x-splade-lazy show="toggled" style="text-align: center;">
                <x-slot:placeholder>
                    <p>Loading items...</p>
                </x-slot:placeholder>

                <ul>
                    @foreach($items as $item)
                        <li>{{data_get($item, 'name')}}</li>
                    @endforeach
                </ul>
            </x-splade-lazy>
        </x-splade-toggle>
    </div>




</x-guest-layout>

