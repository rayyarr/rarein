<script src="https://cdn.tailwindcss.com"></script>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow border sm:rounded-lg">
            <div class="max-w-xl">
                <form method="post" action="" class="mt-6 space-y-6">

                    <input type="hidden" name="nisn" value="232323">
                    <input type="hidden" name="school_fee_id" value="23223">
                    <div>
                        <label for="nama">Nama Pemesan</label>
                        <input id="nama" name="nama" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>

                    <div>
                        <label for="template">Template</label>
                        <input id="template" name="template" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>

                    <div>
                        <label for="tanggal">Tanggal Pemesanan</label>
                        <input id="date" name="date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div>
                        <label for="tagihan">Jumlah Tagihan</label>
                        <input id="tagihan" name="tagihan" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                   
<label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metode Pembayaran</label>
<select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  <option selected>Choose a country</option>
  <option value="US">Dana</option>
  <option value="CA">GOPAY</option>
  <option value="FR">OVO</option>
  <option value="DE">SHOPEEPAY</option>
</select>



<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file bukti pembayaran</label>
<input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">

<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
  Simpan
</button>
                </form>
            </div>
        </div>
    </div>
</div>