<main class="text-center">
    <div class="main-bg text-white p-5 text-container-3">
        <h1 class="display-4">Welcome to Our Chat App</h1>
        <p class="lead">Connect with friends and share your thoughts.</p>
    </div>
    <div class="container my-5 pb-2">
        <h2>Why Our App</h2>
        <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ac justo vel erat vestibulum fringilla. Donec quis sapien sit amet arcu tristique convallis. In hac habitasse platea dictumst. Sed vel elit eget orci scelerisque feugiat.</p>

        <h2 class="pt-2">Features that Delight</h2>
        <p class="mt-3">Donec quis sapien sit amet arcu tristique convallis. In hac habitasse platea dictumst.</p>
    </div>
    <a href="./pages/<?= $_SESSION['logged'] === 'false' ? 'login' : 'chat' ?>" class="fs-2 border rounded py-2 px-3 text-decoration-none bg-light">TRY FOR FREE</a>
</main>