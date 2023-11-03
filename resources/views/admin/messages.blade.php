<style>
    .message {
        position: fixed;
        right: 5%;
        bottom: 5%;
        padding: 20px 20px 20px 10px;
        display: flex;
        align-items: center;
        gap: 20px;
        border-radius: 25px;
    }

    .message, .message i {
        color: white;
    }

    .message ul {
        display: -webkit-box;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .message.success {
        background-color: seagreen;
    }

    .message.error {
        background-color: #dc3545;
    }
</style>

@if ($message = Session::get('success'))
    <div class="message success">
        <i class="fa-solid fa-circle-check fa-2xl"></i>
        <span>{{ $message }}</span>
    </div>
@endif

@if($errors->any())
    <div class="message error">
        <i class="fas fa-solid fa-circle-xmark fa-2xl"></i>
        <ul>
            @foreach ($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    const message = document.querySelector('.message');

    if (message) {
        setTimeout(() => {
            message.style.animation = "fadeOut 1s forwards";
        }, 5000);
    }
</script>