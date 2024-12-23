<!-- Mobile Menu -->
<div x-data="{ open: false }" class="lg:hidden">
    <!-- Toggle Button -->
    <button @click="open = !open" class="fixed top-6 right-6 z-50 p-2 bg-indigo-600 text-white rounded-md focus:outline-none">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>

    <!-- Mobile Menu -->
    <div x-show="open" @click.away="open = false" class="fixed inset-0 bg-indigo-600 text-white z-40 flex flex-col p-6 space-y-4">
        <a href="/" class="text-2xl font-semibold pb-4">Seat<span class="font-light text-slate-300">Smart</span></a>
        <nav class="flex flex-col space-y-4">
            <a href="/" class="flex items-center gap-2 p-6 hover:bg-indigo-500">
                <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" width="800" height="800" fill="none" viewBox="0 0 24 24">
                    <path fill="#FFF" fill-rule="evenodd" d="M4.188 11.379C4.03 11.759 4 11.953 4 12v8.002c0 .55.447.998 1 .998h3v-6a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v6h3c.553 0 1-.447 1-.998V12c0-.047-.03-.241-.188-.621a10.539 10.539 0 0 0-.657-1.277c-.579-.978-1.39-2.122-2.298-3.212-.91-1.092-1.893-2.1-2.807-2.825a7.208 7.208 0 0 0-1.245-.82C12.43 3.058 12.165 3 12 3c-.164 0-.429.059-.806.244a7.21 7.21 0 0 0-1.244.82c-.914.726-1.897 1.734-2.807 2.826-.908 1.09-1.72 2.234-2.298 3.212-.29.49-.511.924-.657 1.277Zm6.121-9.928C10.835 1.19 11.414 1 12 1c.586 0 1.165.191 1.69.45.535.265 1.076.63 1.604 1.048 1.055.837 2.134 1.954 3.1 3.112.966 1.16 1.842 2.391 2.483 3.475.32.541.59 1.061.783 1.528.183.44.34.934.34 1.387v8.002A2.998 2.998 0 0 1 19 23h-3a2 2 0 0 1-2-2v-6h-4v6a2 2 0 0 1-2 2H5c-1.656 0-3-1.34-3-2.998V12c0-.453.157-.947.34-1.387.193-.467.464-.987.783-1.528.64-1.084 1.517-2.315 2.484-3.475.965-1.158 2.044-2.275 3.1-3.112.527-.419 1.068-.783 1.602-1.047Z" clip-rule="evenodd"/>
                </svg>
                Home
            </a>
            <a href="/reservations" class="flex items-center gap-2 p-6 hover:bg-indigo-500">
                <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Reservations
            </a>
            <a href="/tables" class="flex items-center gap-2 p-6 hover:bg-indigo-500">
                <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="800" height="800" viewBox="0 0 214.539 214.539">
                    <path fill="#fff" d="M121.164 154.578h-6.625V89.14h38.937a7.27 7.27 0 0 0 0-14.538h-92.41a7.27 7.27 0 0 0 0 14.538h38.936v65.438h-6.625a7.27 7.27 0 0 0 0 14.539h27.787a7.27 7.27 0 1 0 0-14.539z"/>
                    <path fill="#fff" d="M73.783 120.777a7.27 7.27 0 0 0-7.269-7.269H34.219c-11.08 0-13.41-16.14-13.509-16.869l-6.239-45.122c-.55-3.977-4.217-6.748-8.196-6.205A7.27 7.27 0 0 0 .07 53.508l6.229 45.053c.831 6.47 4.167 16.593 11.367 23.133l-7.485 38.956a7.267 7.267 0 0 0 5.766 8.509 7.264 7.264 0 0 0 8.509-5.766l6.792-35.349h17.579l6.792 35.349a7.27 7.27 0 0 0 14.275-2.744l-6.265-32.605h2.883a7.268 7.268 0 0 0 7.271-7.267zM208.267 45.313c-3.975-.543-7.646 2.229-8.196 6.205l-6.244 45.165c-.094.687-2.424 16.827-13.504 16.827h-32.295a7.27 7.27 0 1 0 0 14.538h2.883l-6.265 32.605a7.267 7.267 0 0 0 5.766 8.509 7.264 7.264 0 0 0 8.509-5.766l6.792-35.349h17.579l6.792 35.349a7.27 7.27 0 0 0 14.276-2.744l-7.485-38.953c7.198-6.534 10.532-16.64 11.357-23.065l6.238-45.123a7.27 7.27 0 0 0-6.203-8.198z"/>
                </svg>
                Tables
            </a>
            <a href="/menus" class="flex items-center gap-2 p-6 hover:bg-indigo-500">
                <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" width="800" height="800" fill="none" viewBox="0 0 24 24">
                    <path fill="#FFF" fill-rule="evenodd" d="M1.733 1.036a1 1 0 0 1 .974.257l20 20a1 1 0 0 1-1.414 1.414L14 15.414 12.914 16.5c-.78.78-2.046.783-2.828 0L3.293 9.708C1.583 7.997 1.019 6.002.879 4.466A9.552 9.552 0 0 1 .897 2.56c.03-.268.067-.539.132-.802a1.01 1.01 0 0 1 .704-.723Zm1.138 3.25c.11 1.212.546 2.717 1.836 4.007l6.793 6.793L12.586 14 2.87 4.285Z" clip-rule="evenodd"/>
                    <path fill="#FFF" d="M18.207 1.793a1 1 0 0 1 0 1.414l-2.896 2.896c-.356.356-.36.87-.113 1.284l3.595-3.594a1 1 0 1 1 1.414 1.414l-3.594 3.594c.413.249.928.244 1.284-.112l2.896-2.896a1 1 0 1 1 1.414 1.414l-2.896 2.896a3 3 0 0 1-3.665.451l-.491-.295-.448.448a1 1 0 1 1-1.414-1.414l.448-.448-.295-.491a3 3 0 0 1 .451-3.665l2.896-2.896a1 1 0 0 1 1.414 0ZM8.207 17.207a1 1 0 1 0-1.414-1.414l-5.5 5.5a1 1 0 1 0 1.414 1.414l5.5-5.5Z"/>
                </svg>
                Menus
            </a>
            <a href="/filemanager" class="flex items-center gap-2 p-6 hover:bg-indigo-500">
                <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" width="800" height="800" fill="none" viewBox="0 0 24 24">
                    <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9v8.8c0 1.12 0 1.68-.218 2.108a2 2 0 0 1-.874.874C17.48 21 16.92 21 15.8 21H8.2c-1.12 0-1.68 0-2.108-.218a2 2 0 0 1-.874-.874C5 19.48 5 18.92 5 17.8V6.2c0-1.12 0-1.68.218-2.108a2 2 0 0 1 .874-.874C6.52 3 7.08 3 8.2 3H13m6 6-6-6m6 6h-5a1 1 0 0 1-1-1V3"/>
                </svg>
                Filemanager
            </a>
            <a href="/users" class="flex items-center gap-2 p-6 hover:bg-indigo-500">
                <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" width="800" height="800" fill="none" viewBox="0 0 24 24">
                    <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0ZM12 14a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7Z" />
                </svg>
                Users
            </a>
        </nav>
    </div>
</div>