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
    width: 120px;
    height: 120px;
    cursor: pointer;
    transition: all 0.3s ease;
    overflow: visible;
    position: relative;
    background: transparent;
    border: none;
    box-shadow: none;
}

.golden-jubilee-btn:hover {
    transform: scale(1.1);
}

.golden-jubilee-img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 15px;
}



/* Mobile Responsive */
@media (max-width: 768px) {
    #golden-jubilee-widget {
        bottom: 10px;
        left: 10px;
    }

    .golden-jubilee-btn {
        width: 100px;
        height: 100px;
    }
}
</style>
