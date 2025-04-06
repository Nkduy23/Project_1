<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
    <style>
        .success-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .success-icon {
            color: #28a745;
            font-size: 50px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✓</div>
        <h2>Đặt hàng thành công!</h2>
        <p>Cảm ơn bạn đã đặt hàng. Mã đơn hàng của bạn là: <strong>#<?= htmlspecialchars($orderId) ?></strong></p>
        <p>Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để xác nhận đơn hàng.</p>
        <p>
            <a href="/">Tiếp tục mua sắm</a> | 
            <a href="order/history">Xem lịch sử đơn hàng</a>
        </p>
    </div>
</body>
</html>