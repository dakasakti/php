<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <!-- <div class="px-4 py-6 sm:px-0">
                    <div class="h-96 rounded-lg border-4 border-dashed border-gray-200"></div>
                </div> -->
        <!-- /End replace -->

        <div class="mb-5 text-xl">
            <p><?= htmlspecialchars($note["title"]) ?></p>
            <p><?= htmlspecialchars($note["body"])  ?></p>
        </div>

        <a href="/notes" class="text-blue-500 hover:underline text-xl">Back to Notes</a>
    </div>
</main>