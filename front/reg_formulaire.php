<main class="flex-grow " role="main" xmlns="http://www.w3.org/1999/html">
    <form action="<?php echo "$action"; ?>" method="<?php echo "$method"; ?>" class="max-w-sm mx-auto mt-50">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-white dark:text-white">Your email</label>
            <input type="email" name="email" id="email" class="shadow-xs bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="name@flowbite.com" required />
        </div>
        <div class="mb-5">
            <label for="pseudo" class="block mb-2 text-sm font-medium text-white dark:text-white">Your pseudo</label>
            <input type="text" name="pseudo" id="pseudo" class="shadow-xs bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="pseudo" required />
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-white dark:text-white">Your password</label>
            <input type="password" name="password" id="password" class="shadow-xs bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
        </div>
        <div class="mb-5">
            <label for="repeat-password" class="block mb-2 text-sm font-medium text-white dark:text-white">Repeat password</label>
            <input type="password" name="repeat-password" id="repeat-password" class="shadow-xs bg-gray-800 border text-white text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register new account</button>
    </form>

    <div class="max-w-sm mx-auto mt-10">
    <a href="<?php echo $racine_path.'control/login.php';?> " class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" >login</a>
    </div>
</main>