<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <!-- <div class="px-4 py-6 sm:px-0">
                    <div class="h-96 rounded-lg border-4 border-dashed border-gray-200"></div>
                </div> -->
        <!-- /End replace -->

        <div class="mb-5 text-xl">
            <p><?= htmlspecialchars($contents["title"]) ?></p>
            <p><?= htmlspecialchars($contents["body"])  ?></p>

            <a href="/notes/edit?id=<?= $contents["id"] ?>" class="mt-5 inline-flex justify-center rounded-md border border-transparent bg-yellow-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</a>
            <form method="POST" class="inline-block">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $contents["id"] ?>">
                <button class="mt-5 inline-flex justify-center rounded-md border border-transparent bg-red-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Delete</button>
            </form>
        </div>


        <a href="/notes" class="text-blue-500 hover:underline text-xl">Back to Notes</a>
    </div>
</main>