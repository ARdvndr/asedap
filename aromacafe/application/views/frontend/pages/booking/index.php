<?php
$this->load->view('frontend/@app-components/partials/master-layout', array(
    'title' => 'Pemesanan',
));
$minDate = date('Y-m-d', strtotime('+3 days'));
?>

<section>
    <div class="my-5">
        <center>
            <h3>Book Now!</h3>
        </center>
        <form class="my-5 w-50" method="POST" action="<?= base_url('booking/process');?>" style="transform: translateX(50%);">
            <div class="form-group">
                <label for="nama">Nama Pemesan</label>
                <input type="hidden" name="id_customer"
                    value="<?= $this->session->userdata('user_id') ? $this->session->userdata('user_id') : '' ?>"
                />
                <input type="text" name="nama" class="form-control"
                    placeholder="Nama lengkap"
                    required
                    readonly
                    value="<?= $this->session->userdata('name') ? $this->session->userdata('name') : '' ?>"
                />
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="spot">Spot</label>
                        <select name="id_tempat" id="spot" class="form-control">
                            <?php foreach($tempat as $spot ):?>
                                <option value="<?= $spot['id_tempat'] ?>"
                                    <?= $spot['id_tempat'] == $id_tempat ? 'selected' : '';?>
                                >
                                    <?= $spot['nama_tempat']; ?>
                                </option>
                            <?php endforeach ?>

                        </select>
                    </div>
                    <div class="col-3">
                        <label for="sewa">Lama Sewa</label>
                        <select id="lama-sewa" class="form-control" name="lama_sewa">
                            <option value="1">1 jam</option>
                            <option value="3">3 jam</option>
                            <option value="5">5 jam</option>
                            <option value="10">10 jam</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="tanggal">Tanggal</label>
                        <input type="datetime-local" class="form-control"
                            id="tanggal"
                            name="tanggal"
                            min="<?= $minDate. 'T00:00'; ?>"
                            required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="paket">Paket Makanan</label>
                        <select name="id_paket" id="paket" class="form-control">
                            <option value="" disabled>-- Pilih Paket --</option>

                            <?php foreach($paket['paket'] as $value ):?>
                                <option value="<?= $value['id'] ?>" data-price="<?= $value['harga']; ?>">
                                    <?= $value['jenis'] .' - '. $value['nama'] ?>
                                </option>
                            <?php endforeach ?>

                        </select>
                    </div>
                    <div class="col">
                        <label for="jumlah-orang">Jumlah Orang (min. 10)</label>
                        <input type="number" name="jumlah_orang" min="10" class="form-control" id="jumlah-orang" value="10">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="spot">Grand Total</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" name="total" id="grand-total" class="form-control" required readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <a href="../home" class="btn btn-warning"><i class="fas fa fa-chevron-left"></i> Batal</a>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Proses Pesanan</button> 
                </div>
            </div>
            
        </form>
    </div>
</section>

<script lang="javascript">
    $(document).ready(function(){
        this.lamaSewa = $("#lama-sewa");
        this.paket = $("#paket");
        this.jumlahOrang = $("#jumlah-orang");
        this.grandTotal = $("#grand-total");

        let self = this;
        
        var jmlOrang = parseInt(self.jumlahOrang.val());
        var hargaPaket = parseInt($('option:selected', self.paket).attr('data-price'));
        var sewa = parseInt(self.lamaSewa.val());

        function grandTotal(){
            let hargaGedung, kebersihan, parkir;

            jmlOrang < 100 ? (
                hargaGedung = (250000*sewa),
                kebersihan = 300000,
                parkir = 300000
            ) : (
                hargaGedung = (1000000*sewa),
                kebersihan = 0,
                parkir = 0
            );

            let total = hargaGedung+kebersihan+parkir;
            return self.grandTotal.val(total+(hargaPaket*jmlOrang));
        }

        self.lamaSewa.on('change', function(){
            sewa = parseInt($(this).val());
            grandTotal();
        });

        self.paket.on('change', function(){
            hargaPaket = parseInt($('option:selected', this).attr('data-price'));
            grandTotal();
        });

        self.jumlahOrang.on('input | change', function(){
            jmlOrang = parseInt($(this).val());
            grandTotal();
        });

        grandTotal();
    })

    // $("#form-pemesanan").on('submit', function(){
    //     $.ajax({
    //         url: 'booking/process',
    //         type: 'POST',
    //         dataType: 'JSON',
    //         data: $(this).serialize(),
    //     })
    // })
</script>
