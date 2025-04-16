<!-- Chào thầy cô, nếu muốn chạy dự án vui lòng đổi lại Directory -->

# Hướng Dẫn Cấu Hình Laragon

## VirtualHost cấu hình mẫu:

```apache
<VirtualHost *:80>
    DocumentRoot "C:/laragon/www/Web_DongHo/public"
    ServerName Web_DongHo.test
    ServerAlias *.Web_DongHo.test

    <Directory "C:/laragon/www/Web_DongHo/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
