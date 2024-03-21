<div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md !w-full min-h-[90vh]">
    <div class="flex justify-between mb-4 border-b pb-6">
        <div class="font-medium font-mona-reg">Update Stock</div>
    </div>
    <div class="mt-3 lg:w-1/2 w-full">
        <span class="text-sm font-bold text-gray-600 uppercase">Search By Ean</span>
        <input name="ean" maxlength="13" class="w-full px-3 py-1 mt-2 text-gray-900 bg-white rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="0">
    </div>
    <form class="btnsubmit" data-aksi="submitproductstock">
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-4">
            <div class="lg:h-[75vh] h-full overflow-y-auto">
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">Product Name</span>
                    <select required name="productid" class="select2 !bg-gray-300" style="width: 100%" data-aksi="updatestoct" data-placeholder="Select a Product..." data-allow-clear="false" title="Select Product...">
                        <option value="">&nbsp;</option>
                        <?php if (sesion_get('productitem') != null) : foreach (sesion_get('productitem') as  $value) : ?>
                                <option data-stock="<?= $value['stock'] ?>" data-ean="<?= $value['ean'] ?>" value="<?= $value['id_product'] ?>"><?= $value['product_name'] . ' (' . $value['id_product'] . ')' ?></option>
                        <?php endforeach;
                        endif; ?>
                    </select>
                </div>
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">Old Stock</span>
                    <input disabled name="oldstock" class="w-full px-3 py-1 mt-2 text-gray-900 bg-gray-300 rounded-lg focus:outline-none focus:shadow-outline rupiah" type="text" placeholder="0">
                </div>
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">New Stock</span>
                    <input required name="stocknew" class="w-full px-3 py-1 mt-2 text-gray-900 bg-white rounded-lg focus:outline-none focus:shadow-outline rupiah" type="text" placeholder="0">
                    <span class="text-gray-500 font-mona-ultralight text-sm">*Only Number.</span><br>
                    <span class=" font-mona-ultralight text-sm hidden text-basics errormargin2">*Please select the product first.</span>
                </div>
                <div class="mt-3">
                    <span class="text-sm font-bold text-gray-600 uppercase">Total Stock</span>
                    <input readonly required name="stock" class="w-full px-3 py-1 mt-2 text-gray-900 bg-gray-300 rounded-lg focus:outline-none focus:shadow-outline rupiah readonly:" type="text" placeholder="0">
                </div>

            </div>
            <div class="mt-2 ">
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