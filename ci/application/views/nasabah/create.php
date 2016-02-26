<?php echo validation_errors(); ?>

<?php echo form_open('nasabah/create') ?>

    <label for="ktp">KTP</label>
    <input type="input" name="ktp" /><br />

    <label for="nama">Nama</label>
    <input type="input" name="nama" /><br />

    <label for="alamat">Alamat</label>
    <input type="input" name="alamat" /><br />

    <label for="umur">Umur</label>
    <input type="input" name="umur" /><br />

    <label for="statuskawin">Status Kawin</label>
    <input type="input" name="statuskawin" /><br />

    <label for="pekerjaan">Pekerjaan</label>
    <input type="input" name="pekerjaan" /><br />

    <label for="slipgaji">Slip Gaji</label>
    <input type="input" name="slipgaji" /><br />

    <input type="submit" name="submit" value="Input Data Nasabah" />

</form>