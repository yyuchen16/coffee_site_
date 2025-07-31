-- 預約資料表（與 reservation_submit.php 對應）
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cafe_name VARCHAR(100) NOT NULL,
    name VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    time_slot VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 投票資料表
CREATE TABLE votes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cafe VARCHAR(100) NOT NULL,
    voted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 其他資料表可依需求補充
