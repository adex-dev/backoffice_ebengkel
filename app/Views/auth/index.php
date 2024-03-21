<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">

    <title>Login!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <?= script_tag('repo/vendors/jquery/jquery-3.7.1.min.js') ?>
</head>

<body class="w-full" style="background-color: rgb(0, 48, 96);">
    <header id="hero">
        <div class="hero h-screen relative flex items-center justify-center">
            <?= img(['src' => "repo/assets/img/splass.gif", 'alt' => "Splass", "class" => "h-[300] p-7 herosplash transition-all ease-in-out duration-500 scale-100  object-cover w-[300px] ", "title" => "logo"]) ?>
        </div>
    </header>
    <main class="flex justify-center items-center min-h-screen container">
        <div class="flex justify-center lg:w-[50rem] items-center flex-col  w-full bg-white min-h-[24rem] rounded shadow-2xl shadow-white backdrop-blur-sm py-5">
            <div class="w-full flex justify-center py-2 ">
                <div class="w-56 mx-4  h-56 rounded-full border-2   border-black relative">
                    <?= img(['src' => "repo/assets/img/logo.png", 'alt' => "logo", "class" => "h-full p-7 -z-10 absolute object-cover w-full ", "title" => "logo"]) ?>
                </div>
            </div>
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
            <div class="mt-10 mx-auto w-full max-w-sm">
                <form class="space-y-6 btnsubmit" data-aksi="login">
                    <div>
                        <label for="nik" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
                        <div class="mt-2">
                            <input id="nik" placeholder="type your nik.." name="nik" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-2 relative">
                            <input required id="password" name="password" placeholder="enter password" type="password" autocomplete="current-password" required class="block w-full password rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <i class='bx bxs-lock absolute  top-[25%] right-4 bx-sm cursor-pointer pass' title="click for view"></i>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-basics px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all ease-in-out duration-500">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
<script>
    let page = window.location.origin + "/";
</script>
<?= script_tag('repo/assets/dist/js/sandbox.js') ?>

</html>