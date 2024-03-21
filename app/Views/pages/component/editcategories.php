<div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md !w-full min-h-[90vh]">
    <div class="flex justify-between mb-4 border-b pb-6">
        <div class="font-medium font-mona-reg">Edit Categories</div>
    </div>
    <form class="btnsubmit" data-aksi="submitcategoriesedit">
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-4">
            <div>
                <div>
                    <label class="text-sm font-bold text-gray-600 uppercase">Categories Name</label>
                    <input type="hidden" name="uid" >
                    <input required name="categoriname" class="w-full p-3 mt-2 text-gray-900 bg-white rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="type here..">
                </div>
            </div>
            <div class="mt-8 ">
                <button type="submit" class=" w-full p-2 px-6 text-sm font-bold tracking-wide text-gray-100 uppercase bg-indigo-700 rounded-lg focus:outline-none focus:shadow-outline inline-flex items-center justify-center">
                    <span> <i class='bx bxs-save bx-md mr-6'></i></span>
                    <span>Submit</span>
                </button>
            </div>
    </form>
</div>