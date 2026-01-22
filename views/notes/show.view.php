<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p>
            <a href = "/notes" class="text-blue-500 underline"> go back...</a>
        </p>
        <p><?= htmlspecialchars($note['body'])?> </p>
        <!--htmlspecialchars → XSS saldırılarını önlemek için -->

        <form class="mt-6" method="POST">
            <!-- Form POST ile gönderiliyor Action yazmadığı için: 👉 Aynı sayfaya geri gönderiliyor -->
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="text-sm text-red-500"> Delete </button>
        </form>
    </div>
</main>


<?php require base_path('views/partials/footer.php') ?>
