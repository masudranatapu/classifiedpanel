<div class="product-item__badge">
    @if ($status == 'pending')
    <div class="badge badge--warning">
        <x-svg.pending-icon width="20" height="20" stroke="#ffbf00"/>
        <div class="badge badge--warning">
            {{ __('pending') }}
        </div>
    </div>
    @endif
    @if ($featured)
    <div class="badge badge--warning">
        <x-svg.check-icon width="16" height="16" stroke="#ffbf00" />
        <div class="badge badge--warning">
            {{ __('featured') }}
        </div>
    </div>
    @endif
</div>
