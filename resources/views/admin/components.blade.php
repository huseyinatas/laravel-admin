@extends('admin.layout')
@section('title', 'Component Grupları')

@section('content')
    <div class="w-full flex">
        <a id="modalBtn" href="#" class="bg-gray-800 py-1 px-5 mb-3 text-white">Yeni Ekle</a>
    </div>
    <div class="relative overflow-x-auto shadow-md ">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Grup İsmi
                </th>

                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($parents as $parent)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <a href="">
                            {{ $parent->title }}
                        </a>
                    </th>

                    <td class="px-6 py-4 text-right">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Düzenle</a>
                        <a href="#" class="ml-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Sil</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div id="defaultModal" aria-hidden="true" class="fixed hidden z-50  overflow-x-hidden overflow-y-auto top-1/2 left-1/2 h-modal md:h-full" style="transform: translate(-50%, -50%)">
        <div class="relative w-full h-full max-w-2xl p-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white  shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Yeni Ekle
                    </h3>
                    <button onclick="modalClose()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <form action="{{route('admin.component-parents.store')}}" method="post">
                    @csrf
                    <div class="p-6 space-y-6 w-full">
                        <label for="" class="grid gap-1 overflow-x-hidden">
                            <span class="w-full text-gray-300">Grup İsmi</span>
                            <input required name="name" type="text" class="md:w-screen appearance-none rounded-none relative block px-3 py-2 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm border-0 border-b mb-3 bg-transparent text-white">
                        </label>
                    </div>
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-toggle="defaultModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const modal = document.getElementById('defaultModal');
        const modalBtn = document.querySelector('#modalBtn');
        modalBtn.addEventListener('click', function (){
            modal.style.display = 'block'
        })
        function modalClose(){
            modal.style.display = 'none'
        }
    </script>
@endsection
