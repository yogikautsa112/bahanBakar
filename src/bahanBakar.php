<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Bakar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/src/public/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Beli Bahan Bakar</h5>
                <form method="post" action="" class="d-flex flex-column gap-4 justify-content-center">
                    <label for="fuel-type">Pilih Tipe Bahan Bakar:</label>
                    <select id="fuel-type" name="fuel-type" class="form-select">
                        <option value="Shell Super">Shell Super</option>
                        <option value="Shell V-Power">Shell V-Power</option>
                        <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                        <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
                    </select>
                    <div>
                        <label for="liter">Masukkan Jumlah Liter:</label>
                        <input type="number" id="liter" name="liter" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Beli</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="card-body" id="result">
                <?php
                class Shell {
                    private $harga;
                private $ppn = 0.10;
                public function __construct($harga) {
                    $this->harga = $harga;
                }
        
                    public function getharga() {
                        return $this->harga;
                    }
        
                public function getPPN() {
                    return $this->ppn;
                }
                }
        
                class Beli extends Shell {
                    private $liter;
                    private $tipe;
        
                public function __construct($harga, $liter, $tipe) {
                    parent::__construct($harga);
                    $this->liter = $liter;
                    $this->tipe = $tipe;
                }
        
                public function calculateTotal() {
                    $subTotal = $this->getharga() * $this->liter;
                    $ppnAmount = $subTotal * $this->getPPN();
                    $total = $subTotal + $ppnAmount;
                    return $total;
                }
        
                public function getReceipt() {
                        $total = $this->calculateTotal();
                        return "Anda membeli bahan bakar minyak tipe $this->tipe dengan jumlah $this->liter Liter. Total yang harus anda bayar Rp. " . number_format($total, 2, '.', ',');
                    }
                }
        
                $hargaShell = array(
                    'Shell Super' => 15420,
                    'Shell V-Power' => 16130,
                    'Shell V-Power Diesel' => 18310,
                    'Shell V-Power Nitro' => 16510
                );
        
                if (isset($_POST['fuel-type']) && isset($_POST['liter'])) {
                    $tipe = $_POST['fuel-type'];
                    $liter = $_POST['liter'];
                    $harga = $hargaShell[$tipe];
                    $beli = new Beli($harga, $liter, $tipe);
                    $receipt = $beli->getReceipt();
                    echo "<p id='result'>$receipt</p>";
                }
        
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
