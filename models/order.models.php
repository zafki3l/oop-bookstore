<?php

include_once 'model.models.php';

class Order extends Model
{
    // Attributes
    private $id;
    private $user_id;
    private $status;
    private $created_at;
    private $updated_at;

    // Constructor
    public function __construct(
        $db = new Database,
        $id = null,
        $user_id = null,
        $status = null,
        $created_at = null,
        $updated_at = null
    ) {
        parent::__construct($db);

        $this->id = $id;
        $this->user_id = $user_id;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    /**
     * Summary of getAllOrder
     * Lấy ra tất cả dữ liệu trong bảng orders
     * 
     * @param mixed $start (Bắt đầu tại)
     * @param mixed $row_per_page (Số dữ liệu mỗi trang)
     * @return array<array|bool|null>
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số $start và $row_per_page vào truy vấn để thực hiện phân trang.
     * - Thực thi truy vấn và lấy kết quả bằng function get_result().
     * - Chuyển kết quả truy vấn sang dạng mảng kết hợp (Associative Array)
     */
    public function getAllOrder($start, $row_per_page)
    {
        $conn = $this->getDb()->connect();

        $sql = "SELECT o.id as 'id', 
                        u.id as 'user_id', 
                        u.username as 'username',
                        SUM(od.quantity * od.price) as 'total_price',
                        o.status as 'status', 
                        o.created_at as 'created_at', 
                        o.updated_at as 'updated_at' 
                FROM orders o
                JOIN users u ON u.id = o.user_id
                JOIN orderdetails od ON o.id = od.order_id
                GROUP BY o.id
                ORDER BY o.id DESC
                LIMIT $start, $row_per_page";

        $query = $conn->execute_query($sql);

        $data = [];

        while ($row = $query->fetch_assoc()) {
            $data[] = $row;
        }

        $conn->close();

        return $data;
    }

    /**
     * Summary of getAllOrderCount
     * Lấy ra tất cả records trong bảng orders
     * 
     *
     * - Thực thi truy vấn.
     * - Chuyển kết quả truy vấn sang dạng mảng kết hợp (Associative Array)
     * - Trả về tổng số bản ghi
     */
    public function getAllOrderCount() 
    {
        $conn = $this->getDb()->connect();

        $query = $conn->execute_query("SELECT count(id) as 'total' FROM orders");

        $data = $query->fetch_assoc();

        return $data['total'];
    }

    /**
     * Summary of getFindOrderCount
     * Lấy ra tổng số bản ghi của kết quả tìm kiếm của người dùng
     * 
     * @param mixed $id (mã người dùng)
     * @param mixed $username (Tên người dùng)
     * @return int|string
     * 
     * - Thực thi truy vấn.
     * - Chuyển kết quả truy vấn sang dạng mảng kết hợp (Associative Array)
     * - Trả về tổng số bản ghi
     */
    public function getFindOrderCount($id, $username)
    {
        $conn = $this->getDb()->connect();

        $sql = "SELECT *
                FROM orders o
                JOIN users u ON u.id = o.user_id
                JOIN orderdetails od ON o.id = od.order_id
                WHERE o.id = ? OR u.username LIKE ?
                GROUP BY o.id";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $id, $username);
        $stmt->execute();

        return $stmt->num_rows;
    }
    
    /**
     * Summary of createOrder
     * Tạo 1 đơn hàng mới khi người dùng bấm mua hàng
     * 
     * @param int $user_id (mã người dùng)
     * @return int|string
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     * - Lấy ra $order_id
     * - return $order_id
     */
    public function createOrder($user_id)
    {
        $conn = $this->getDb()->connect();

        $stmt = $conn->prepare("INSERT INTO orders (user_id) VALUES (?)");
        $stmt->bind_param('i', $user_id);
        $stmt->execute();

        
        $order_id = $conn->insert_id;

        return $order_id;
    }

    /**
     * Summary of editOrder
     * Sửa trạng thái của đơn hàng (Pending/Being Delivered/Completed)
     * @return void
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
    public function editOrder()
    {
        $conn = $this->getDb()->connect();

        $sql = "UPDATE orders
                    SET status = ?
                    WHERE id = ?";

        $stmt = $conn->prepare($sql);


        $stmt->bind_param(
            'ii',
            $this->status,
            $this->id
        );


        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    /**
     * Summary of deleteOrder
     * Xóa đơn hàng
     * 
     * @param int $id (mã đơn hàng)
     * @return void
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     */
    public function deleteOrder($id)
    {
        $conn = $this->getDb()->connect();

        $sql = "DELETE FROM orders WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    /**
     * Summary of createSalesReport
     * Tính doanh thu theo tháng
     * @return array
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     * - Chuyển về dạng mảng kết hợp
     */
    public function createSalesReport()
    {
        $conn = $this->getDb()->connect();

        $query = $conn->execute_query(
            "SELECT MONTH(o.created_at) as 'month', 
                    YEAR(o.created_at) as 'year',
                    SUM(od.quantity * od.price) as 'income'
            FROM orders o
            JOIN orderdetails od ON o.id = od.order_id
            WHERE o.status = 2
            GROUP BY MONTH(o.created_at), YEAR(o.created_at)
            ORDER BY MONTH(o.created_at), YEAR(o.created_at)"
        );

        $data = [];

        while ($row = $query->fetch_assoc()) {
            $month = $row['month'];
            $data[$month] = $row;
        }

        $query->close();
        $conn->close();

        /** Tạo mảng kết hợp với đủ 12 tháng
         * 
         * Kiểm tra tháng có tồn tại không?
         * Nếu không thì tạo 1 dữ liệu mới với doanh thu = 0
         */
        $finalData = [];
        for ($m = 1; $m <= 12; $m++) {
            if (isset($data[$m])) {
                $finalData[] = $data[$m];
            } else {
                $finalData[] = [
                    'month' => $m,
                    'year' => date('Y'), 
                    'income' => 0
                ];
            }
        }

        return $finalData;
    }

    /**
     * Summary of findOrder
     * Tìm kiếm đơn hàng
     * 
     * @param mixed $id (Mã đơn hàng)
     * @param mixed $username (Tên người dùng)
     * @param mixed $start (Bắt đầu từ)
     * @param mixed $row_per_page (Số kết quả mỗi trang)
     * @return array
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     * - Chuyển về dạng mảng kết hợp
     */
    public function findOrder($id, $username, $start, $row_per_page)
    {
        $conn = $this->getDb()->connect();

        $sql = "SELECT o.id as 'id', 
                        u.id as 'user_id', 
                        u.username as 'username',
                        SUM(od.quantity * od.price) as 'total_price',
                        o.status as 'status', 
                        o.created_at as 'created_at', 
                        o.updated_at as 'updated_at' 
                FROM orders o
                JOIN users u ON u.id = o.user_id
                JOIN orderdetails od ON o.id = od.order_id
                WHERE o.id = ? OR u.username LIKE ?
                GROUP BY o.id
                ORDER BY o.id DESC
                LIMIT $start, $row_per_page";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $id, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
        $conn->close();

        return $data;
    }

    /**
     * Summary of getAllUserOrder
     * Lấy ra tất cả đơn hàng của khách hàng
     * 
     * @return array<array|bool|null>
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     * - Chuyển về dạng mảng kết hợp
     */
    public function getAllUserOrder()
    {
        $conn = $this->getDb()->connect();

        $id = $_SESSION['id'];
        $sql = "SELECT o.id as 'order_id',
                        o.status as 'status',
                        b.name as 'book_name',
                        b.author as 'author',
                        od.price as 'price',
                        od.quantity as 'quantity',
                        b.cover as 'cover',
                        (od.price * od.quantity) as 'total_price' 
                FROM books b
                JOIN orderdetails od ON b.id = od.book_id
                JOIN orders o ON o.id = od.order_id
                WHERE o.user_id = ?
                ORDER BY o.id DESC";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * Summary of getUserOrderByStatus
     * Lấy ra tất cả đơn hàng khách hàng theo trạng thái đơn hàng
     * 
     * @param mixed $status
     * @return array<array|bool|null>
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     * - Chuyển về dạng mảng kết hợp
     */
    public function getUserOrderByStatus($status)
    {
        $conn = $this->getDb()->connect();

        $id = $_SESSION['id'];
        $sql = "SELECT o.id as 'order_id',
                        o.status as 'status',
                        b.name as 'book_name',
                        b.author as 'author',
                        od.price as 'price',
                        od.quantity as 'quantity',
                        b.cover as 'cover',
                        (od.price * od.quantity) as 'total_price' 
                FROM books b
                JOIN orderdetails od ON b.id = od.book_id
                JOIN orders o ON o.id = od.order_id
                WHERE o.user_id = ? AND o.status = ?
                ORDER BY o.id DESC";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $id, $status);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * Summary of countAllUserOrder
     * Đếm tổng số lượng đơn hàng của khách hàng
     * @return int|string
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     * - Lấy ra kết quả
     * - return số lượng bản ghi
     */
    public function countAllUserOrder()
    {
        $conn = $this->getDb()->connect();

        $id = $_SESSION['id'];
        $sql = "SELECT o.id as 'order_id'
                FROM orders o
                WHERE o.user_id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows;
    }

    /**
     * Summary of countUserOrderByStatus
     * Đếm đơn hàng của khách hàng theo trạng thái
     * 
     * @param mixed $status
     * @return int|string
     * 
     * - Sử dụng Prepared Statement để chống SQL Injection.
     * - Chuẩn bị truy vấn với tham số ẩn danh.
     * - Truyền tham số vào truy vấn.
     * - Thực thi truy vấn
     * - Lấy ra kết quả
     * - return số lượng bản ghi
     */
    public function countUserOrderByStatus($status)
    {
        $conn = $this->getDb()->connect();

        $id = $_SESSION['id'];
        $sql = "SELECT o.id as 'order_id'
                FROM orders o
                WHERE o.user_id = ? AND o.status = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $id, $status);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows;
    }

    // Getters & Setters
    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCreateAt()
    {
        return $this->created_at;
    }

    public function getUpdateAt()
    {
        return $this->updated_at;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}


