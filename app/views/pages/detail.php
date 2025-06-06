<div class="container-main no-border">
    <?php getBreadcrumb($productDetail); ?>

    <div class="product-detail grid-2 gap-32">
        <div class="product-detail__left">
            <div class="product-detail__image">
                <img id="main-image" src="<?= $GLOBALS['baseUrl'] ?>img/product/<?php echo htmlspecialchars($productDetail['HinhAnh']); ?>"
                    alt="<?php echo htmlspecialchars($productDetail['TenSanPham']); ?>">
                <?php if (!empty($productDetail['Nhan'])): ?>
                    <div class="product-detail__label"><?php echo htmlspecialchars($productDetail['Nhan']); ?></div>
                <?php endif; ?>
            </div>
            <div class="product-detail__thumbnails flex-center gap-8">
                <img class="thumbnail" src="<?= $GLOBALS['baseUrl'] ?>img/product/<?php echo htmlspecialchars($productDetail['HinhAnh']); ?>"
                    alt="Thumbnail 1" onclick="changeImage(this)">
                <img class="thumbnail" src="<?= $GLOBALS['baseUrl'] ?>img/product/<?php echo htmlspecialchars($productDetail['HinhAnhHover']); ?>"
                    alt="Thumbnail 2" onclick="changeImage(this)">
            </div>
        </div>

        <div class="product-detail__right flex-column-center-justify">
            <h1 class="product-detail__name"><?php echo htmlspecialchars($productDetail['TenSanPham']); ?></h1>
            <p class="product-detail__price"><?php echo number_format($productDetail['DonGia'], 0, ',', '.') ?> ₫</p>
            <div class="product-detail__quantity-size flex flex-start gap-16">
                <div class="product-detail__quantity">
                    <label for="quantity">Số lượng:</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1">
                </div>
                <div class="product-detail__size">
                    <label for="size">Size:</label>
                    <select id="size" name="size">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
            </div>

            <p class="product-detail__description">
                <?php echo htmlspecialchars($productDetail['MoTa']); ?>
            </p>

            <button class="product-detail__buy-btn gray">Xem Showroom còn hàng</button>

            <form action="/add-to-cart" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $productDetail['MaSanPham']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $productDetail['TenSanPham']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $productDetail['DonGia']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $productDetail['HinhAnh']; ?>">
                <input type="hidden" name="product_quantity" value="1">
                <input type="hidden" name="product_size" value="S">
                <button type="submit" class="product-detail__buy-btn darkred">Thêm vào giỏ hàng</button>
            </form>

            <button class="product-detail__buy-btn blue">Mua trả góp - Duyệt hồ sơ trong 3 phút</button>
            <p class="product-detail__text">Có thanh toán:<b> Trả góp</b> khi mua Online (Qua thẻ tín dụng)</p>
            <p class="product-detail__text">Gọi đặt mua:<b> 1900.6777 (8:00-1:30)</b></p>
            <div class="product-detail__note">
                <p>Ưu đãi thêm dự kiến áp dụng 2025</p>
                <hr>
                <p>Dịch vụ gói quà miễn phí khi mua tại cửa hàng.</p>
                <p>Khi thanh toán qua Home PayLater tại Hải Triều:</p>
                <ul>
                    <li>- Giảm 50% tối đa 100K cho đơn từ 200K</li>
                    <li>- Giảm 5% tối đa 500K</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Phần icon dưới detail -->
    <div class="product-detail__icons grid-4 gap-16">
        <div class="product-detail__icon flex-center gap-8">
            <svg id="Layer_1" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.15 23.65">
                <g id="Layer_1-2" data-name="Layer 1">
                    <g>
                        <g>
                            <path d="M3.96,19.95c-.29-.23-.34-.66-.1-.95,.23-.29,.66-.34,.95-.1l4.27,3.45c.29,.23,.34,.66,.1,.95-.23,.29-.66,.34-.95,.1l-4.27-3.45Zm4.19-3.31c-.3-.23-.35-.65-.12-.95,.23-.3,.65-.35,.95-.12l6.66,5.16c1.18-.94,2.49-2.05,3.58-2.98,.73-.62,1.36-1.15,1.8-1.51h0s0,0,0,0c.16-.13,.25-.31,.26-.49,.02-.19-.03-.39-.16-.55h0s0,0,0,0c-.13-.16-.31-.25-.5-.27-.19-.02-.39,.03-.55,.16l-3.95,3.21c-.24,.2-.58,.2-.83,.02h0s-7.89-5.78-7.89-5.78c-.3-.22-.37-.64-.15-.95,.03-.05,.07-.08,.11-.12,2.28-1.94,2.78-3.87,2.54-5.18-.07-.4-.21-.74-.39-.98-.14-.19-.29-.32-.42-.35-.04-.01-.09,0-.14,.03-.16,1.49-1.16,2.76-2.5,3.75-1.52,1.12-3.5,1.89-5.09,2.17v4.93c0,.37-.3,.68-.68,.68s-.68-.3-.68-.68v-5.51H0c0-.34,.26-.64,.61-.67,1.48-.15,3.51-.88,5.03-2,1.11-.82,1.93-1.84,1.97-2.96,0-.14,.05-.27,.13-.39,.46-.62,1.07-.8,1.69-.64,.04,.01,.09,.03,.13,.04V.68c0-.37,.3-.68,.68-.68h13.23c.37,0,.68,.3,.68,.68V13.91c0,.37-.3,.68-.68,.68h-1.15c.24,.4,.34,.86,.3,1.31-.05,.53-.31,1.05-.75,1.41h0s-.01,0-.01,0c-.41,.33-1.04,.87-1.77,1.49-1.24,1.06-2.77,2.35-4.03,3.34-.26,.2-.63,.18-.87-.03l-7.03-5.46Zm5.53-1.16l1.16-.9h-.54c-.37,0-.68-.3-.68-.68s.3-.68,.68-.68h8.49V1.36H10.92v3.73c.13,.29,.24,.62,.31,.99,.28,1.55-.18,3.74-2.37,5.88l4.82,3.53Zm3.34-.9s-.06,.07-.1,.09l-2.11,1.64,.84,.62,2.89-2.35h-1.53ZM1.86,18.12c-.28-.25-.31-.68-.06-.96,.25-.28,.68-.31,.96-.06l.15,.13s.03,.02,.04,.04l.16,.14c.28,.25,.31,.67,.06,.95-.25,.28-.67,.31-.95,.06-.08-.07-.11-.09-.17-.15-.01,0-.03-.02-.04-.03l-.15-.13Z"></path>
                            <path d="M7.87,19.87c-.3-.23-.35-.66-.12-.95,.23-.3,.66-.35,.95-.12l4.67,3.63c.3,.23,.35,.66,.12,.95-.23,.3-.66,.35-.95,.12l-4.67-3.63Z"></path>
                        </g>
                        <path d="M14.24,9.48v-.07s1.25,0,1.25,0v.04c.11,.63,.69,1.11,1.47,1.11,.89,0,1.51-.61,1.51-1.49h0c0-.87-.63-1.48-1.51-1.48-.43,0-.79,.13-1.08,.37-.14,.11-.26,.26-.35,.43h-1.17l.36-4.36h4.6v1.1h-3.53l-.21,2.26h.03c.33-.5,.95-.8,1.7-.8,1.43,0,2.46,1.03,2.46,2.46h0c0,1.55-1.16,2.61-2.81,2.61-1.56,0-2.62-.93-2.72-2.17Z"></path>
                    </g>
                </g>
            </svg>
            <h5>Tăng bảo hành lên đến 5 năm - xem thêm</h5>
        </div>
        <div class="product-detail__icon flex-center gap-8">
            <svg id="Layer_1" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.15 23.65">
                <g id="Layer_1-2" data-name="Layer 1">
                    <g>
                        <g>
                            <path d="M3.96,19.95c-.29-.23-.34-.66-.1-.95,.23-.29,.66-.34,.95-.1l4.27,3.45c.29,.23,.34,.66,.1,.95-.23,.29-.66,.34-.95,.1l-4.27-3.45Zm4.19-3.31c-.3-.23-.35-.65-.12-.95,.23-.3,.65-.35,.95-.12l6.66,5.16c1.18-.94,2.49-2.05,3.58-2.98,.73-.62,1.36-1.15,1.8-1.51h0s0,0,0,0c.16-.13,.25-.31,.26-.49,.02-.19-.03-.39-.16-.55h0s0,0,0,0c-.13-.16-.31-.25-.5-.27-.19-.02-.39,.03-.55,.16l-3.95,3.21c-.24,.2-.58,.2-.83,.02h0s-7.89-5.78-7.89-5.78c-.3-.22-.37-.64-.15-.95,.03-.05,.07-.08,.11-.12,2.28-1.94,2.78-3.87,2.54-5.18-.07-.4-.21-.74-.39-.98-.14-.19-.29-.32-.42-.35-.04-.01-.09,0-.14,.03-.16,1.49-1.16,2.76-2.5,3.75-1.52,1.12-3.5,1.89-5.09,2.17v4.93c0,.37-.3,.68-.68,.68s-.68-.3-.68-.68v-5.51H0c0-.34,.26-.64,.61-.67,1.48-.15,3.51-.88,5.03-2,1.11-.82,1.93-1.84,1.97-2.96,0-.14,.05-.27,.13-.39,.46-.62,1.07-.8,1.69-.64,.04,.01,.09,.03,.13,.04V.68c0-.37,.3-.68,.68-.68h13.23c.37,0,.68,.3,.68,.68V13.91c0,.37-.3,.68-.68,.68h-1.15c.24,.4,.34,.86,.3,1.31-.05,.53-.31,1.05-.75,1.41h0s-.01,0-.01,0c-.41,.33-1.04,.87-1.77,1.49-1.24,1.06-2.77,2.35-4.03,3.34-.26,.2-.63,.18-.87-.03l-7.03-5.46Zm5.53-1.16l1.16-.9h-.54c-.37,0-.68-.3-.68-.68s.3-.68,.68-.68h8.49V1.36H10.92v3.73c.13,.29,.24,.62,.31,.99,.28,1.55-.18,3.74-2.37,5.88l4.82,3.53Zm3.34-.9s-.06,.07-.1,.09l-2.11,1.64,.84,.62,2.89-2.35h-1.53ZM1.86,18.12c-.28-.25-.31-.68-.06-.96,.25-.28,.68-.31,.96-.06l.15,.13s.03,.02,.04,.04l.16,.14c.28,.25,.31,.67,.06,.95-.25,.28-.67,.31-.95,.06-.08-.07-.11-.09-.17-.15-.01,0-.03-.02-.04-.03l-.15-.13Z"></path>
                            <path d="M7.87,19.87c-.3-.23-.35-.66-.12-.95,.23-.3,.66-.35,.95-.12l4.67,3.63c.3,.23,.35,.66,.12,.95-.23,.3-.66,.35-.95,.12l-4.67-3.63Z"></path>
                        </g>
                        <path d="M14.24,9.48v-.07s1.25,0,1.25,0v.04c.11,.63,.69,1.11,1.47,1.11,.89,0,1.51-.61,1.51-1.49h0c0-.87-.63-1.48-1.51-1.48-.43,0-.79,.13-1.08,.37-.14,.11-.26,.26-.35,.43h-1.17l.36-4.36h4.6v1.1h-3.53l-.21,2.26h.03c.33-.5,.95-.8,1.7-.8,1.43,0,2.46,1.03,2.46,2.46h0c0,1.55-1.16,2.61-2.81,2.61-1.56,0-2.62-.93-2.72-2.17Z"></path>
                    </g>
                </g>
            </svg>
            <h5>Tăng bảo hành lên đến 5 năm - xem thêm</h5>
        </div>
        <div class="product-detail__icon flex-center gap-8">
            <svg id="Layer_1" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.15 23.65">
                <g id="Layer_1-2" data-name="Layer 1">
                    <g>
                        <g>
                            <path d="M3.96,19.95c-.29-.23-.34-.66-.1-.95,.23-.29,.66-.34,.95-.1l4.27,3.45c.29,.23,.34,.66,.1,.95-.23,.29-.66,.34-.95,.1l-4.27-3.45Zm4.19-3.31c-.3-.23-.35-.65-.12-.95,.23-.3,.65-.35,.95-.12l6.66,5.16c1.18-.94,2.49-2.05,3.58-2.98,.73-.62,1.36-1.15,1.8-1.51h0s0,0,0,0c.16-.13,.25-.31,.26-.49,.02-.19-.03-.39-.16-.55h0s0,0,0,0c-.13-.16-.31-.25-.5-.27-.19-.02-.39,.03-.55,.16l-3.95,3.21c-.24,.2-.58,.2-.83,.02h0s-7.89-5.78-7.89-5.78c-.3-.22-.37-.64-.15-.95,.03-.05,.07-.08,.11-.12,2.28-1.94,2.78-3.87,2.54-5.18-.07-.4-.21-.74-.39-.98-.14-.19-.29-.32-.42-.35-.04-.01-.09,0-.14,.03-.16,1.49-1.16,2.76-2.5,3.75-1.52,1.12-3.5,1.89-5.09,2.17v4.93c0,.37-.3,.68-.68,.68s-.68-.3-.68-.68v-5.51H0c0-.34,.26-.64,.61-.67,1.48-.15,3.51-.88,5.03-2,1.11-.82,1.93-1.84,1.97-2.96,0-.14,.05-.27,.13-.39,.46-.62,1.07-.8,1.69-.64,.04,.01,.09,.03,.13,.04V.68c0-.37,.3-.68,.68-.68h13.23c.37,0,.68,.3,.68,.68V13.91c0,.37-.3,.68-.68,.68h-1.15c.24,.4,.34,.86,.3,1.31-.05,.53-.31,1.05-.75,1.41h0s-.01,0-.01,0c-.41,.33-1.04,.87-1.77,1.49-1.24,1.06-2.77,2.35-4.03,3.34-.26,.2-.63,.18-.87-.03l-7.03-5.46Zm5.53-1.16l1.16-.9h-.54c-.37,0-.68-.3-.68-.68s.3-.68,.68-.68h8.49V1.36H10.92v3.73c.13,.29,.24,.62,.31,.99,.28,1.55-.18,3.74-2.37,5.88l4.82,3.53Zm3.34-.9s-.06,.07-.1,.09l-2.11,1.64,.84,.62,2.89-2.35h-1.53ZM1.86,18.12c-.28-.25-.31-.68-.06-.96,.25-.28,.68-.31,.96-.06l.15,.13s.03,.02,.04,.04l.16,.14c.28,.25,.31,.67,.06,.95-.25,.28-.67,.31-.95,.06-.08-.07-.11-.09-.17-.15-.01,0-.03-.02-.04-.03l-.15-.13Z"></path>
                            <path d="M7.87,19.87c-.3-.23-.35-.66-.12-.95,.23-.3,.66-.35,.95-.12l4.67,3.63c.3,.23,.35,.66,.12,.95-.23,.3-.66,.35-.95,.12l-4.67-3.63Z"></path>
                        </g>
                        <path d="M14.24,9.48v-.07s1.25,0,1.25,0v.04c.11,.63,.69,1.11,1.47,1.11,.89,0,1.51-.61,1.51-1.49h0c0-.87-.63-1.48-1.51-1.48-.43,0-.79,.13-1.08,.37-.14,.11-.26,.26-.35,.43h-1.17l.36-4.36h4.6v1.1h-3.53l-.21,2.26h.03c.33-.5,.95-.8,1.7-.8,1.43,0,2.46,1.03,2.46,2.46h0c0,1.55-1.16,2.61-2.81,2.61-1.56,0-2.62-.93-2.72-2.17Z"></path>
                    </g>
                </g>
            </svg>
            <h5>Tăng bảo hành lên đến 5 năm - xem thêm</h5>
        </div>
        <div class="product-detail__icon flex-center gap-8">
            <svg id="Layer_1" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.15 23.65">
                <g id="Layer_1-2" data-name="Layer 1">
                    <g>
                        <g>
                            <path d="M3.96,19.95c-.29-.23-.34-.66-.1-.95,.23-.29,.66-.34,.95-.1l4.27,3.45c.29,.23,.34,.66,.1,.95-.23,.29-.66,.34-.95,.1l-4.27-3.45Zm4.19-3.31c-.3-.23-.35-.65-.12-.95,.23-.3,.65-.35,.95-.12l6.66,5.16c1.18-.94,2.49-2.05,3.58-2.98,.73-.62,1.36-1.15,1.8-1.51h0s0,0,0,0c.16-.13,.25-.31,.26-.49,.02-.19-.03-.39-.16-.55h0s0,0,0,0c-.13-.16-.31-.25-.5-.27-.19-.02-.39,.03-.55,.16l-3.95,3.21c-.24,.2-.58,.2-.83,.02h0s-7.89-5.78-7.89-5.78c-.3-.22-.37-.64-.15-.95,.03-.05,.07-.08,.11-.12,2.28-1.94,2.78-3.87,2.54-5.18-.07-.4-.21-.74-.39-.98-.14-.19-.29-.32-.42-.35-.04-.01-.09,0-.14,.03-.16,1.49-1.16,2.76-2.5,3.75-1.52,1.12-3.5,1.89-5.09,2.17v4.93c0,.37-.3,.68-.68,.68s-.68-.3-.68-.68v-5.51H0c0-.34,.26-.64,.61-.67,1.48-.15,3.51-.88,5.03-2,1.11-.82,1.93-1.84,1.97-2.96,0-.14,.05-.27,.13-.39,.46-.62,1.07-.8,1.69-.64,.04,.01,.09,.03,.13,.04V.68c0-.37,.3-.68,.68-.68h13.23c.37,0,.68,.3,.68,.68V13.91c0,.37-.3,.68-.68,.68h-1.15c.24,.4,.34,.86,.3,1.31-.05,.53-.31,1.05-.75,1.41h0s-.01,0-.01,0c-.41,.33-1.04,.87-1.77,1.49-1.24,1.06-2.77,2.35-4.03,3.34-.26,.2-.63,.18-.87-.03l-7.03-5.46Zm5.53-1.16l1.16-.9h-.54c-.37,0-.68-.3-.68-.68s.3-.68,.68-.68h8.49V1.36H10.92v3.73c.13,.29,.24,.62,.31,.99,.28,1.55-.18,3.74-2.37,5.88l4.82,3.53Zm3.34-.9s-.06,.07-.1,.09l-2.11,1.64,.84,.62,2.89-2.35h-1.53ZM1.86,18.12c-.28-.25-.31-.68-.06-.96,.25-.28,.68-.31,.96-.06l.15,.13s.03,.02,.04,.04l.16,.14c.28,.25,.31,.67,.06,.95-.25,.28-.67,.31-.95,.06-.08-.07-.11-.09-.17-.15-.01,0-.03-.02-.04-.03l-.15-.13Z"></path>
                            <path d="M7.87,19.87c-.3-.23-.35-.66-.12-.95,.23-.3,.66-.35,.95-.12l4.67,3.63c.3,.23,.35,.66,.12,.95-.23,.3-.66,.35-.95,.12l-4.67-3.63Z"></path>
                        </g>
                        <path d="M14.24,9.48v-.07s1.25,0,1.25,0v.04c.11,.63,.69,1.11,1.47,1.11,.89,0,1.51-.61,1.51-1.49h0c0-.87-.63-1.48-1.51-1.48-.43,0-.79,.13-1.08,.37-.14,.11-.26,.26-.35,.43h-1.17l.36-4.36h4.6v1.1h-3.53l-.21,2.26h.03c.33-.5,.95-.8,1.7-.8,1.43,0,2.46,1.03,2.46,2.46h0c0,1.55-1.16,2.61-2.81,2.61-1.56,0-2.62-.93-2.72-2.17Z"></path>
                    </g>
                </g>
            </svg>
            <h5>Tăng bảo hành lên đến 5 năm - xem thêm</h5>
        </div>
        <div class="product-detail__icon flex-center gap-8">
            <svg id="Layer_1" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.15 23.65">
                <g id="Layer_1-2" data-name="Layer 1">
                    <g>
                        <g>
                            <path d="M3.96,19.95c-.29-.23-.34-.66-.1-.95,.23-.29,.66-.34,.95-.1l4.27,3.45c.29,.23,.34,.66,.1,.95-.23,.29-.66,.34-.95,.1l-4.27-3.45Zm4.19-3.31c-.3-.23-.35-.65-.12-.95,.23-.3,.65-.35,.95-.12l6.66,5.16c1.18-.94,2.49-2.05,3.58-2.98,.73-.62,1.36-1.15,1.8-1.51h0s0,0,0,0c.16-.13,.25-.31,.26-.49,.02-.19-.03-.39-.16-.55h0s0,0,0,0c-.13-.16-.31-.25-.5-.27-.19-.02-.39,.03-.55,.16l-3.95,3.21c-.24,.2-.58,.2-.83,.02h0s-7.89-5.78-7.89-5.78c-.3-.22-.37-.64-.15-.95,.03-.05,.07-.08,.11-.12,2.28-1.94,2.78-3.87,2.54-5.18-.07-.4-.21-.74-.39-.98-.14-.19-.29-.32-.42-.35-.04-.01-.09,0-.14,.03-.16,1.49-1.16,2.76-2.5,3.75-1.52,1.12-3.5,1.89-5.09,2.17v4.93c0,.37-.3,.68-.68,.68s-.68-.3-.68-.68v-5.51H0c0-.34,.26-.64,.61-.67,1.48-.15,3.51-.88,5.03-2,1.11-.82,1.93-1.84,1.97-2.96,0-.14,.05-.27,.13-.39,.46-.62,1.07-.8,1.69-.64,.04,.01,.09,.03,.13,.04V.68c0-.37,.3-.68,.68-.68h13.23c.37,0,.68,.3,.68,.68V13.91c0,.37-.3,.68-.68,.68h-1.15c.24,.4,.34,.86,.3,1.31-.05,.53-.31,1.05-.75,1.41h0s-.01,0-.01,0c-.41,.33-1.04,.87-1.77,1.49-1.24,1.06-2.77,2.35-4.03,3.34-.26,.2-.63,.18-.87-.03l-7.03-5.46Zm5.53-1.16l1.16-.9h-.54c-.37,0-.68-.3-.68-.68s.3-.68,.68-.68h8.49V1.36H10.92v3.73c.13,.29,.24,.62,.31,.99,.28,1.55-.18,3.74-2.37,5.88l4.82,3.53Zm3.34-.9s-.06,.07-.1,.09l-2.11,1.64,.84,.62,2.89-2.35h-1.53ZM1.86,18.12c-.28-.25-.31-.68-.06-.96,.25-.28,.68-.31,.96-.06l.15,.13s.03,.02,.04,.04l.16,.14c.28,.25,.31,.67,.06,.95-.25,.28-.67,.31-.95,.06-.08-.07-.11-.09-.17-.15-.01,0-.03-.02-.04-.03l-.15-.13Z"></path>
                            <path d="M7.87,19.87c-.3-.23-.35-.66-.12-.95,.23-.3,.66-.35,.95-.12l4.67,3.63c.3,.23,.35,.66,.12,.95-.23,.3-.66,.35-.95,.12l-4.67-3.63Z"></path>
                        </g>
                        <path d="M14.24,9.48v-.07s1.25,0,1.25,0v.04c.11,.63,.69,1.11,1.47,1.11,.89,0,1.51-.61,1.51-1.49h0c0-.87-.63-1.48-1.51-1.48-.43,0-.79,.13-1.08,.37-.14,.11-.26,.26-.35,.43h-1.17l.36-4.36h4.6v1.1h-3.53l-.21,2.26h.03c.33-.5,.95-.8,1.7-.8,1.43,0,2.46,1.03,2.46,2.46h0c0,1.55-1.16,2.61-2.81,2.61-1.56,0-2.62-.93-2.72-2.17Z"></path>
                    </g>
                </g>
            </svg>
            <h5>Tăng bảo hành lên đến 5 năm - xem thêm</h5>
        </div>
        <div class="product-detail__icon flex-center gap-8">
            <svg id="Layer_1" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.15 23.65">
                <g id="Layer_1-2" data-name="Layer 1">
                    <g>
                        <g>
                            <path d="M3.96,19.95c-.29-.23-.34-.66-.1-.95,.23-.29,.66-.34,.95-.1l4.27,3.45c.29,.23,.34,.66,.1,.95-.23,.29-.66,.34-.95,.1l-4.27-3.45Zm4.19-3.31c-.3-.23-.35-.65-.12-.95,.23-.3,.65-.35,.95-.12l6.66,5.16c1.18-.94,2.49-2.05,3.58-2.98,.73-.62,1.36-1.15,1.8-1.51h0s0,0,0,0c.16-.13,.25-.31,.26-.49,.02-.19-.03-.39-.16-.55h0s0,0,0,0c-.13-.16-.31-.25-.5-.27-.19-.02-.39,.03-.55,.16l-3.95,3.21c-.24,.2-.58,.2-.83,.02h0s-7.89-5.78-7.89-5.78c-.3-.22-.37-.64-.15-.95,.03-.05,.07-.08,.11-.12,2.28-1.94,2.78-3.87,2.54-5.18-.07-.4-.21-.74-.39-.98-.14-.19-.29-.32-.42-.35-.04-.01-.09,0-.14,.03-.16,1.49-1.16,2.76-2.5,3.75-1.52,1.12-3.5,1.89-5.09,2.17v4.93c0,.37-.3,.68-.68,.68s-.68-.3-.68-.68v-5.51H0c0-.34,.26-.64,.61-.67,1.48-.15,3.51-.88,5.03-2,1.11-.82,1.93-1.84,1.97-2.96,0-.14,.05-.27,.13-.39,.46-.62,1.07-.8,1.69-.64,.04,.01,.09,.03,.13,.04V.68c0-.37,.3-.68,.68-.68h13.23c.37,0,.68,.3,.68,.68V13.91c0,.37-.3,.68-.68,.68h-1.15c.24,.4,.34,.86,.3,1.31-.05,.53-.31,1.05-.75,1.41h0s-.01,0-.01,0c-.41,.33-1.04,.87-1.77,1.49-1.24,1.06-2.77,2.35-4.03,3.34-.26,.2-.63,.18-.87-.03l-7.03-5.46Zm5.53-1.16l1.16-.9h-.54c-.37,0-.68-.3-.68-.68s.3-.68,.68-.68h8.49V1.36H10.92v3.73c.13,.29,.24,.62,.31,.99,.28,1.55-.18,3.74-2.37,5.88l4.82,3.53Zm3.34-.9s-.06,.07-.1,.09l-2.11,1.64,.84,.62,2.89-2.35h-1.53ZM1.86,18.12c-.28-.25-.31-.68-.06-.96,.25-.28,.68-.31,.96-.06l.15,.13s.03,.02,.04,.04l.16,.14c.28,.25,.31,.67,.06,.95-.25,.28-.67,.31-.95,.06-.08-.07-.11-.09-.17-.15-.01,0-.03-.02-.04-.03l-.15-.13Z"></path>
                            <path d="M7.87,19.87c-.3-.23-.35-.66-.12-.95,.23-.3,.66-.35,.95-.12l4.67,3.63c.3,.23,.35,.66,.12,.95-.23,.3-.66,.35-.95,.12l-4.67-3.63Z"></path>
                        </g>
                        <path d="M14.24,9.48v-.07s1.25,0,1.25,0v.04c.11,.63,.69,1.11,1.47,1.11,.89,0,1.51-.61,1.51-1.49h0c0-.87-.63-1.48-1.51-1.48-.43,0-.79,.13-1.08,.37-.14,.11-.26,.26-.35,.43h-1.17l.36-4.36h4.6v1.1h-3.53l-.21,2.26h.03c.33-.5,.95-.8,1.7-.8,1.43,0,2.46,1.03,2.46,2.46h0c0,1.55-1.16,2.61-2.81,2.61-1.56,0-2.62-.93-2.72-2.17Z"></path>
                    </g>
                </g>
            </svg>
            <h5>Tăng bảo hành lên đến 5 năm - xem thêm</h5>
        </div>
        <div class="product-detail__icon flex-center gap-8">
            <svg id="Layer_1" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.15 23.65">
                <g id="Layer_1-2" data-name="Layer 1">
                    <g>
                        <g>
                            <path d="M3.96,19.95c-.29-.23-.34-.66-.1-.95,.23-.29,.66-.34,.95-.1l4.27,3.45c.29,.23,.34,.66,.1,.95-.23,.29-.66,.34-.95,.1l-4.27-3.45Zm4.19-3.31c-.3-.23-.35-.65-.12-.95,.23-.3,.65-.35,.95-.12l6.66,5.16c1.18-.94,2.49-2.05,3.58-2.98,.73-.62,1.36-1.15,1.8-1.51h0s0,0,0,0c.16-.13,.25-.31,.26-.49,.02-.19-.03-.39-.16-.55h0s0,0,0,0c-.13-.16-.31-.25-.5-.27-.19-.02-.39,.03-.55,.16l-3.95,3.21c-.24,.2-.58,.2-.83,.02h0s-7.89-5.78-7.89-5.78c-.3-.22-.37-.64-.15-.95,.03-.05,.07-.08,.11-.12,2.28-1.94,2.78-3.87,2.54-5.18-.07-.4-.21-.74-.39-.98-.14-.19-.29-.32-.42-.35-.04-.01-.09,0-.14,.03-.16,1.49-1.16,2.76-2.5,3.75-1.52,1.12-3.5,1.89-5.09,2.17v4.93c0,.37-.3,.68-.68,.68s-.68-.3-.68-.68v-5.51H0c0-.34,.26-.64,.61-.67,1.48-.15,3.51-.88,5.03-2,1.11-.82,1.93-1.84,1.97-2.96,0-.14,.05-.27,.13-.39,.46-.62,1.07-.8,1.69-.64,.04,.01,.09,.03,.13,.04V.68c0-.37,.3-.68,.68-.68h13.23c.37,0,.68,.3,.68,.68V13.91c0,.37-.3,.68-.68,.68h-1.15c.24,.4,.34,.86,.3,1.31-.05,.53-.31,1.05-.75,1.41h0s-.01,0-.01,0c-.41,.33-1.04,.87-1.77,1.49-1.24,1.06-2.77,2.35-4.03,3.34-.26,.2-.63,.18-.87-.03l-7.03-5.46Zm5.53-1.16l1.16-.9h-.54c-.37,0-.68-.3-.68-.68s.3-.68,.68-.68h8.49V1.36H10.92v3.73c.13,.29,.24,.62,.31,.99,.28,1.55-.18,3.74-2.37,5.88l4.82,3.53Zm3.34-.9s-.06,.07-.1,.09l-2.11,1.64,.84,.62,2.89-2.35h-1.53ZM1.86,18.12c-.28-.25-.31-.68-.06-.96,.25-.28,.68-.31,.96-.06l.15,.13s.03,.02,.04,.04l.16,.14c.28,.25,.31,.67,.06,.95-.25,.28-.67,.31-.95,.06-.08-.07-.11-.09-.17-.15-.01,0-.03-.02-.04-.03l-.15-.13Z"></path>
                            <path d="M7.87,19.87c-.3-.23-.35-.66-.12-.95,.23-.3,.66-.35,.95-.12l4.67,3.63c.3,.23,.35,.66,.12,.95-.23,.3-.66,.35-.95,.12l-4.67-3.63Z"></path>
                        </g>
                        <path d="M14.24,9.48v-.07s1.25,0,1.25,0v.04c.11,.63,.69,1.11,1.47,1.11,.89,0,1.51-.61,1.51-1.49h0c0-.87-.63-1.48-1.51-1.48-.43,0-.79,.13-1.08,.37-.14,.11-.26,.26-.35,.43h-1.17l.36-4.36h4.6v1.1h-3.53l-.21,2.26h.03c.33-.5,.95-.8,1.7-.8,1.43,0,2.46,1.03,2.46,2.46h0c0,1.55-1.16,2.61-2.81,2.61-1.56,0-2.62-.93-2.72-2.17Z"></path>
                    </g>
                </g>
            </svg>
            <h5>Tăng bảo hành lên đến 5 năm - xem thêm</h5>
        </div>
    </div>
    <!-- Thông tin sản phẩm chia làm 2 cột -->
    <div class="product-detail__info grid gap-16">
        <div class="product-detail__info-left">
            <h3 class="product-detail__info-title size ">Thông tin sản phẩm</h3>
            <ul class="product-detail__info-list">
                <li class="product-detail__info-item"><b>Thương hiệu:</b> <?= htmlspecialchars($attributes['brand']) ?></li>
                <li class="product-detail__info-item"><b>Số hiệu sản phẩm:</b> <?= htmlspecialchars($attributes['model_number']) ?></li>
                <li class="product-detail__info-item"><b>Bộ sưu tập:</b> <?= htmlspecialchars($attributes['collection']) ?></li>
                <li class="product-detail__info-item"><b>Xuất xứ:</b> <?= htmlspecialchars($attributes['origin']) ?></li>
                <li class="product-detail__info-item"><b>Giới tính:</b> <?= htmlspecialchars($attributes['gender']) ?></li>
                <li class="product-detail__info-item"><b>Kính:</b> <?= htmlspecialchars($attributes['glass']) ?></li>
                <li class="product-detail__info-item"><b>Máy:</b> <?= htmlspecialchars($attributes['movement']) ?></li>
                <li class="product-detail__info-item"><b>Bảo hành quốc tế:</b> <?= htmlspecialchars($attributes['international_warranty']) ?></li>
                <li class="product-detail__info-item"><b>Bảo hành tại Khánh Duy:</b> <?= htmlspecialchars($attributes['local_warranty']) ?></li>
                <li class="product-detail__info-item"><b>Đường kính mặt số:</b> <?= htmlspecialchars($attributes['dial_diameter']) ?> mm</li>
                <li class="product-detail__info-item"><b>Bề dày mặt số:</b> <?= htmlspecialchars($attributes['case_thickness']) ?> mm</li>
                <li class="product-detail__info-item"><b>Niềng:</b> <?= htmlspecialchars($attributes['bezel']) ?></li>
                <li class="product-detail__info-item"><b>Dây đeo:</b> <?= htmlspecialchars($attributes['strap']) ?></li>
                <li class="product-detail__info-item"><b>Màu mặt số:</b> <?= htmlspecialchars($attributes['dial_color']) ?></li>
                <li class="product-detail__info-item"><b>Chống nước:</b> <?= htmlspecialchars($attributes['water_resistance']) ?></li>
                <li class="product-detail__info-item"><b>Chức năng:</b> <?= nl2br(htmlspecialchars($attributes['functions'])) ?></li>
            </ul>
        </div>
        <div class="product-detail__info-right">
            <h3 class="product-detail__info-title size">Chi tiết sản phẩm</h3>
            <p class="product-detail__info-text"><?= htmlspecialchars($attributes['description1']) ?></p>
            <p class="product-detail__info-title">
                1. Vì DW00400386 đơn sắc nhưng không hề đơn điệu
            </p>
            <p class="product-detail__info-text"><?= htmlspecialchars($attributes['description2']) ?></p>
            <button class="product-detail__toggle-info-btn">
                <span class="btn-text">Xem thêm chi tiết</span>
                <span class="btn-icon">▼</span>
            </button>

            <img class="product-detail__info-image" src="<?= $GLOBALS['baseUrl'] ?>img/product/<?php echo htmlspecialchars($productDetail['HinhAnh']); ?>" alt="Hình ảnh minh họa 1">
            <p class="product-detail__info-title">
                2. Vì DW00400386 đơn sắc nhưng không hề đơn điệu
            </p>
            <p class="product-detail__info-text"><?= htmlspecialchars($attributes['description3']) ?></p>
            <img class="product-detail__info-image" src="<?= $GLOBALS['baseUrl'] ?>img/product/<?php echo htmlspecialchars($productDetail['HinhAnhHover']); ?>" alt="Hình ảnh minh họa 2">
        </div>
    </div>

    <!-- Bình luận -->
    <section class="product-detail__comment">
        <h3>Bình luận sản phẩm</h3>

        <form action="/comment" method="POST" class="product-detail__comment-form">
            <input type="hidden" name="product_id" value="<?= $productDetail['MaSanPham'] ?>">
            <?php if (isset($_SESSION['user'])): ?>
                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['MaTaiKhoan'] ?>">
                <input type="hidden" name="name" value="<?= $_SESSION['user']['TenDangNhap'] ?>">
            <?php else: ?>
                <input type="text" name="name" placeholder="Tên của bạn" required>
            <?php endif; ?>
            <textarea name="content" rows="4" placeholder="Nhập bình luận..." required></textarea>
            <button type="submit">Gửi bình luận</button>
        </form>

        <button class="product-detail__toggle-info-btn cmt  ">
            <span class="btn-text">Xem thêm bình luận</span>
            <span class="btn-icon">▼</span>
        </button>

        <div class="product-detail__comment-list">
            <?php if ($comments): ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment-item">
                        <strong><?= htmlspecialchars($comment['TenKhachHang']) ?></strong>
                        <span class="comment-time"><?= date('d/m/Y H:i', strtotime($comment['ThoiGianBinhLuan'])) ?></span>
                        <p><?= nl2br(htmlspecialchars($comment['NoiDung'])) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="error-message">Không có bình luận nào.</p>
            <?php endif; ?>
        </div>
    </section>


    <!-- Sản phẩm liên quan -->
    <div class="product-detail__related">
        <h3 class="product-detail__related-title size">Sản phẩm liên quan</h3>
        <div class="product-detail__related-list grid-4 gap-16">
            <?php foreach ($relatedProducts as $relatedProduct): ?>
                <div class="product-detail__related-item">
                    <a href="/detail/<?= $relatedProduct['MaSanPham'] ?>">
                        <img src="<?= $GLOBALS['baseUrl'] ?>img/product/<?php echo htmlspecialchars($relatedProduct['HinhAnh']); ?>" alt="Hình ảnh sản phẩm" class="product-detail__related-image">
                    </a>
                    <div class="product-detail__related-info">
                        <a href="/detail/<?= $relatedProduct['MaSanPham'] ?>">
                            <p class="product-detail__related-name"><?= $relatedProduct['TenSanPham'] ?></p>
                        </a>
                        <p class="product-detail__related-price"><?= number_format($relatedProduct['DonGia']) ?> ₫</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Có thể bạn cũng thích -->
    <div class="product-detail__related">
        <h3 class="product-detail__related-title size">Có thể bạn cũng thích</h3>
        <div class="product-detail__related-list grid-4 gap-16">
            <?php foreach ($relatedProducts as $relatedProduct): ?>
                <div class="product-detail__related-item">
                    <a href="/detail/<?= $relatedProduct['MaSanPham'] ?>">
                        <img src="<?= $GLOBALS['baseUrl'] ?>img/product/<?php echo htmlspecialchars($relatedProduct['HinhAnh']); ?>" alt="Hình ảnh sản phẩm" class="product-detail__related-image">
                    </a>
                    <div class="product-detail__related-info">
                        <a href="/detail/<?= $relatedProduct['MaSanPham'] ?>">
                            <p class="product-detail__related-name"><?= $relatedProduct['TenSanPham'] ?></p>
                        </a>
                        <p class="product-detail__related-price"><?= number_format($relatedProduct['DonGia']) ?> ₫</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    function changeImage(thumbnail) {
        document.getElementById('main-image').src = thumbnail.src;
    }
</script>

<script>
    const quantityInput = document.getElementById('quantity');
    const sizeSelect = document.getElementById('size');

    const hiddenQuantity = document.querySelector('input[name="product_quantity"]');
    const hiddenSize = document.querySelector('input[name="product_size"]');

    // Cập nhật khi người dùng thay đổi số lượng
    quantityInput.addEventListener('input', function() {
        hiddenQuantity.value = this.value;
    });

    // Cập nhật khi người dùng chọn size
    sizeSelect.addEventListener('change', function() {
        hiddenSize.value = this.value;
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy tất cả các nút toggle
        const toggleButtons = document.querySelectorAll(".product-detail__toggle-info-btn");
        const infoRight = document.querySelector(".product-detail__info-right");
        const productCmt = document.querySelector(".product-detail__comment");

        // Gắn sự kiện cho mỗi nút
        toggleButtons.forEach(button => {
            button.addEventListener("click", function() {
                // Chỉ toggle nút được click
                button.classList.toggle("active");

                // Lấy các phần tử text và icon trong nút hiện tại
                const btnText = button.querySelector(".product-detail__btn-text");
                const btnIcon = button.querySelector(".product-detail__btn-icon");

                // Xác định xem nút này có class 'cmt' hay không
                const isCmtButton = button.classList.contains("cmt");

                if (isCmtButton) {
                    // Xử lý riêng cho nút bình luận
                    productCmt.classList.toggle("active");
                } else {
                    // Xử lý riêng cho nút thông tin
                    infoRight.classList.toggle("active");
                }

                // Cập nhật text và icon chỉ cho nút được click
                if (button.classList.contains("active")) {
                    btnText.textContent = isCmtButton ? "Ẩn bình luận" : "Thu gọn";
                    btnIcon.textContent = "▲";
                } else {
                    btnText.textContent = isCmtButton ? "Xem bình luận" : "Xem thêm thông tin";
                    btnIcon.textContent = "▼";
                }
            });
        });
    });
</script>