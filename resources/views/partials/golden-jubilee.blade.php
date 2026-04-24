<!-- Golden Jubilee Floating Button -->
<div id="golden-jubilee-widget">
    <a href="#" class="golden-jubilee-btn" aria-label="Golden Jubilee Celebration">
        <img src="{{ asset('goldan_jubli.png') }}" alt="Golden Jubilee" class="golden-jubilee-img">
    </a>
</div>

<style>
/* Golden Jubilee Widget Styles */
#golden-jubilee-widget {
    position: fixed;
    bottom: 20px;
    left: 20px;
    z-index: 9998;
}

.golden-jubilee-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    border: 3px solid #fff;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
    cursor: pointer;
    transition: all 0.3s ease;
    overflow: hidden;
    position: relative;
}

.golden-jubilee-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.6);
}

.golden-jubilee-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

/* Pulse animation for attention */
.golden-jubilee-btn::before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border-radius: 50%;
    border: 2px solid #f59e0b;
    animation: pulse-ring 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    opacity: 0;
}

@keyframes pulse-ring {
    0% {
        transform: scale(0.8);
        opacity: 0.8;
    }
    100% {
        transform: scale(1.3);
        opacity: 0;
    }
}

/* Mobile Responsive */
@media (max-width: 768px) {
    #golden-jubilee-widget {
        bottom: 10px;
        left: 10px;
    }

    .golden-jubilee-btn {
        width: 60px;
        height: 60px;
    }
}
</style>
