<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form action="/notes" method="POST">
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                <div>
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="company-website" class="block text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span></label>
                                        <input type="text" name="title" id="title" value="<?= $_POST["title"] ?? "" ?>" autocomplete="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="title">

                                        <?php if (isset($contents["title"])) : ?>
                                            <p class="mt-3 text-red-500"><?= $contents["title"] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div>
                                    <label for="about" class="block text-sm font-medium text-gray-700">Body <span class="text-red-500">*</span></label>
                                    <div class="mt-1">
                                        <textarea id="about" name="body" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="content"><?= $_POST["body"] ?? "" ?></textarea>
                                        <?php if (isset($contents["body"])) : ?>
                                            <p class="mt-3 text-red-500"><?= $contents["body"] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>

                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <a href="/notes" class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Back</a>
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>