[TOC]

# API Service Laravel 10 + PHP 8

### 运行环境
-   Linux
-   Nginx
-   PHP 8.1 ~ 8.2
-   MySQL 8

### 项目部署
1. 克隆项目
2. composer install 安装依赖扩展(如遇到版本问题 可尝试参数 --ignore-platform-reqs)
3. cp .env.example .env 生成配置文件
4. php artisan key:generate 生成密钥
5. php artisan migrate:fresh --seed
6. chmod -R 777 storage
7. php artisan storage:link

### 其它
-   工具类 /app/Utils
-   公用函数 /app/helpers.php
-   API ENV 公用参数 /app/config/api.php
