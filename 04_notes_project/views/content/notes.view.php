<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <!-- <div class="px-4 py-6 sm:px-0">
                    <div class="h-96 rounded-lg border-4 border-dashed border-gray-200"></div>
                </div> -->
        <!-- /End replace -->

        <a href="/notes/create" class="mb-5 inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create</a>

        <?php foreach ($notes as $note) : ?>
            <a href="note?id=<?= $note["id"] ?>" class="text-blue-500 hover:underline text-xl">
                <li><?= htmlspecialchars($note["title"]) ?></li>
            </a>
        <?php endforeach ?>
    </div>
</main>