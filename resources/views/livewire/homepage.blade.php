<div class="bg-white p-4 shadow-md rounded-md flex items-center space-x-4">
    <span class="text-gray-600">Ingelogd als {{ Auth::user()->name }}</span>


    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf

        <button @click.prevent="$root.submit();"
                class="bg-green text-white py-1 px-4 rounded focus:outline-none hover:bg-green-600 transition duration-200">
            Uitloggen
        </button>
    </form>



</div>
