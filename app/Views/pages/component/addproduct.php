<div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md !w-full min-h-[90vh]">
    <div class="flex justify-between mb-4 border-b pb-6">
        <div class="font-medium font-mona-reg">Add Product</div>
    </div>
    <form class="btnsubmit" data-aksi="submitproductadd">
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-4">
            <div class="lg:h-[75vh] h-full overflow-y-auto">
                <div>
                    <span class="text-sm font-bold text-gray-600 uppercase">Product Name</span>
                    <input autofocus name="namaproduct" class="w-full px-3 py-1 mt-2 text-gray-900 bg-white rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="Type here..">
                </div>
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">Category</span>
                    <select required name="categori" class="select2 !bg-gray-300" style="width: 100%" data-placeholder="Select a Categori..." data-allow-clear="false" title="Select Categori...">
                        <option value="">&nbsp;</option>
                        <?php if (sesion_get('categoriitem') != null) : foreach (sesion_get('categoriitem') as  $value) : ?>
                                <option value="<?= $value['id'] ?>"><?= $value['name_kategori'] ?></option>
                        <?php endforeach;
                        endif; ?>
                    </select>
                </div>
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">Ean</span>
                    <input name="ean" maxlength="13" class="w-full px-3 py-1 mt-2 text-gray-900 bg-white rounded-lg focus:outline-none focus:shadow-outline" type="tel" placeholder="0">
                    <span class="text-gray-500 font-mona-ultralight text-sm">*product barcode code.</span>
                </div>
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">purchase price</span>
                    <input name="hargabeli" class="w-full px-3 py-1 mt-2 text-gray-900 bg-white rounded-lg focus:outline-none focus:shadow-outline rupiah" type="text" placeholder="Type here..">
                    <span class="text-gray-500 font-mona-ultralight text-sm">*Price when purchasing goods.</span>
                </div>
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">Stock</span>
                    <input name="stock" class="w-full px-3 py-1 mt-2 text-gray-900 bg-white rounded-lg focus:outline-none focus:shadow-outline rupiah" type="text" placeholder="Type here..">
                    <span class="text-gray-500 font-mona-ultralight text-sm">*Only Number.</span>
                </div>
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">Margin Member</span>
                    <input name="marginmember" required minlength="1" maxlength="3" class="w-full px-3 py-1 mt-2 text-gray-900 bg-white rounded-lg focus:outline-none focus:shadow-outline" type="tel" placeholder="0">
                    <span class=" font-mona-ultralight text-sm hidden text-basics errormargin1">*Please insert price.</span>
                    <span class="text-gray-500 font-mona-ultralight text-sm">*Only Number.</span>
                </div>
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">Purchasing for member</span>
                    <input name="purcasemember" required class="w-full px-3 py-1 mt-2 text-gray-900  bg-gray-300 rounded-lg focus:outline-none focus:shadow-outline readonly" type="text" readonly placeholder="0">
                </div>
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">Margin NonMember</span>
                    <input name="marginnonmember" required minlength="1" maxlength="3" class="w-full px-3 py-1 mt-2 text-gray-900 bg-white rounded-lg focus:outline-none focus:shadow-outline" type="tel" placeholder="0">
                    <span class="text-gray-500 font-mona-ultralight text-sm">*Only Number.</span>
                    <span class=" font-mona-ultralight text-sm hidden text-basics errormargin2">*Please insert price.</span>
                </div>
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">Purchasing for Non member</span>
                    <input required name="purcasenonmember" class="w-full px-3 py-1 mt-2 text-gray-900 bg-gray-300 rounded-lg focus:outline-none focus:shadow-outline readonly" type="text" readonly placeholder="0">
                </div>
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">Discount</span>
                    <select required name="diskon" class="select2 !bg-gray-300" style="width: 100%" data-placeholder="Select a Discount..." data-allow-clear="false" title="Select a Discount...">
                        <option value="">&nbsp;</option>
                        <option value="valid">True</option>
                        <option value="nonvalid">False</option>
                    </select>
                </div>
            </div>
            <div class="mt-8 ">
                <button type="submit" class=" w-full p-2 px-6 text-sm font-bold tracking-wide text-gray-100 uppercase bg-indigo-700 rounded-lg focus:outline-none focus:shadow-outline inline-flex items-center justify-center">
                    <span> <i class='bx bxs-save bx-md mr-6'></i></span>
                    <span>Submit</span>
                </button>
                <a href="product" class="mt-2 w-full p-2 px-6 text-sm font-bold tracking-wide text-gray-100 uppercase bg-primary rounded-lg focus:outline-none focus:shadow-outline inline-flex items-center justify-center">
                    <span> <i class='bx bx-package bx-md mr-6'></i></span>
                    <span>List Product</span>
                </a>
            </div>
    </form>
</div>