
<style>
    .toast {
        position: fixed;
        z-index: 10;
        bottom: 25px;
        right: 30px;
        border-radius: 12px;
        background: #fff;
        padding: 20px 35px 20px 25px;
        box-shadow: 0 6px 20px -5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transform: translateX(calc(100% + 30px));
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35);
    }

    .toast.active {
        transform: translateX(0%);
    }

    .toast .toast-content {
        display: flex;
        align-items: center;
    }

    .toast-content .check {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 35px;
        min-width: 35px;
        background-color: #4070f4;
        color: #fff;
        font-size: 20px;
        border-radius: 50%;
    }
    .toast-content .error {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 35px;
        min-width: 35px;
        background-color: red;
        color: #fff;
        font-size: 20px;
        border-radius: 50%;
    }

    .toast-content .message {
        display: flex;
        flex-direction: column;
        margin: 0 20px;
    }

    .message .text {
        font-size: 16px;
        font-weight: 400;
        color: #666666;
    }

    .message .text.text-1 {
        font-weight: 600;
        color: #333;
    }

    .toast .progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        width: 100%;

    }

    .toast .progress:before {
        content: "";
        position: absolute;
        bottom: 0;
        right: 0;
        height: 100%;
        width: 100%;
        @if(session()->has('success'))
            background-color: #4070f4;
        @else
            background-color: red;
        @endif
    }

    .progress.active:before {
        animation: progress 5s linear forwards;
    }

    @keyframes progress {
        100% {
            right: 100%;
        }
    }

</style>

@if(session()->has('success'))
    <div class="toast active" x-data="{ show : true}"
         x-init="setTimeout(() => show = false, 5000)"
         x-show="show">
        <div class="toast-content">
            <i class="fas fa-solid fa-check check"></i>

            <div class="message">
                @if(session('success') !== 'Good Bye!')
                    <span class="text text-1">Success</span>
                @endif
                <span class="text text-2">{{session('success')}}</span>
            </div>
        </div>

        <div class="progress active"></div>
    </div>

@elseif(session()->has('error'))
    <div class="toast active" x-data="{ show : true}"
         x-init="setTimeout(() => show = false, 5000)"
         x-show="show">
        <div class="toast-content">
            <i class="fas fa-solid fa-exclamation error"></i>

            <div class="message">
                <span class="text text-1">Error</span>
                <span class="text text-2">{{session('error')}}</span>
            </div>
        </div>

        <div class="progress active"></div>
    </div>
@endif
