<?= $this->extend('template/layer'); ?>
<?= $this->section('content'); ?>
<main class="md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
    <?= $this->include('components/topbar'); ?>
    <section class="lg:p-6 p-0  w-full">
        <?php if (uri_segment(2)) :
            switch (uri_segment(2)) {
                case 'dashboard':
                   echo $this->include('pages/component/dashboard');
                    break;
                case 'product':
                   echo $this->include('pages/component/listproduct');
                    break;
                case 'addproduct':
                   echo $this->include('pages/component/addproduct');
                    break;
                case 'category':
                   echo $this->include('pages/component/listcategory');
                    break;
                case 'addcategory':
                   echo $this->include('pages/component/addcategories');
                    break;
                case 'editcategory':
                   echo $this->include('pages/component/editcategories');
                    break;
                case 'editproduct':
                   echo $this->include('pages/component/editproduct');
                    break;
                case 'updatestock':
                   echo $this->include('pages/component/updatestock');
                    break;

                default:
                    redirect()->to('login');
                    break;
            }
        else :
            redirect()->to('login');
        ?>
        <?php endif; ?>
    </section>
</main>
<?= $this->endSection(); ?>