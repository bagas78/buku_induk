<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Print</title>

	<!--Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css"> 
	<!--jQuery 3 -->
  	<script src="<?php echo base_url() ?>adminLTE/bower_components/jquery/dist/jquery.min.js"></script>

  	<style type="text/css">
  		.table-borderless > tbody > tr > td,
		.table-borderless > tbody > tr > th,
		.table-borderless > tfoot > tr > td,
		.table-borderless > tfoot > tr > th,
		.table-borderless > thead > tr > td,
		.table-borderless > thead > tr > th {
		    border: none;
		}
  	</style>
</head>
<body style="padding: 1%; font-size: 12px;">

	<h4 align="center"><b>LEMBAR BUKU INDUK PESERTA DIDIK</b></h4>
	<h5 align="center">NO. INDUK PESERTA NASIONAL / NO. INDUK SISWA SEKOLAH : </h5>

	<br/>

	<div class="row">
		<div class="col-md-10 col-xs-10">
			<table class="table table-borderless">

				<!-- A -->
				<tr>
					<th colspan="3">A. KETERANGAN TENTANG PESERTA DIDIK</th>
				</tr>
				<tr>
					<td>1. Nama Lengkap Peserta Didik</td>
					<td>: <?php echo $data['a1'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160; Nama Panggilan</td>
					<td>: <?php echo $data['a2'] ?></td>
				</tr>
				<tr>
					<td>2. jenis Kelamin</td>
					<td>: <?php echo $data['a3'] ?></td>
				</tr>
				<tr>
					<td>3. Tempat dan tanggal lahir</td>
					<td>: <?php echo $data['a4'] ?></td>
				</tr>
				<tr>
					<td>4. Agama</td>
					<td>: <?php echo $data['a5'] ?></td>
				</tr>
				<tr>
					<td>5. Kewarganegaraan</td>
					<td>: <?php echo $data['a6'] ?></td>
				</tr>
				<tr>
					<td>6. Anak keberapa</td>
					<td>: <?php echo $data['a7'] ?></td>
				</tr>
				<tr>
					<td>7. Jumlah saudara kandung</td>
					<td>: <?php echo $data['a8'] ?></td>
				</tr>
				<tr>
					<td>8. Jumlah saudara tiri</td>
					<td>: <?php echo $data['a9'] ?></td>
				</tr>
				<tr>
					<td>9. Jumlah saudara singkat</td>
					<td>: <?php echo $data['a10'] ?></td>
				</tr>
				<tr>
					<td>10. Anak yatim/piatu/yatim piatu</td>
					<td>: <?php echo $data['a11'] ?></td>
				</tr>
				<tr>
					<td>11. Bahasa sehari-hari di rumah</td>
					<td>: <?php echo $data['a12'] ?></td>
				</tr>

				<!-- B -->
				<tr>
					<th colspan="3">B. KETERANGAN TEMPAT TINGGAL</th>
				</tr>
				<tr>
					<td>12. Alamat</td>
					<td>: <?php echo $data['b1'] ?></td>
				</tr>
				<tr>
					<td>13. Nomor telepon/HP</td>
					<td>: <?php echo $data['b2'] ?></td>
				</tr>
				<tr>
					<td>14. Tinggal dengan orang tua/saudara/di asmara/kost</td>
					<td>: <?php echo $data['b3'] ?></td>
				</tr>
				<tr>
					<td>15. Jarak tempat tinggal ke sekolah</td>
					<td>: <?php echo $data['b4'] ?> km</td>
				</tr>

				<!-- C -->
				<tr>
					<th colspan="3">C. KETERANGAN KESEHATAN</th>
				</tr>
				<tr>
					<td>16. Golongan darah</td>
					<td>: <?php echo $data['c1'] ?></td>
				</tr>
				<tr>
					<td>17. Penyakit yang pernah di derita</td>
					<td>: <?php echo $data['c2'] ?></td>
				</tr>
				<tr>
					<td>18. Kelainan jasmani</td>
					<td>: <?php echo $data['c3'] ?></td>
				</tr>
				<tr>
					<td>19. Tinggi dan berat dan (saat diterima di sekolah ini)</td>
					<td>: <?php echo $data['c4'] ?> cm</td>
				</tr>

				<!-- D -->
				<tr>
					<th colspan="3">D. KETERANGAN PENDIDIKAN</th>
				</tr>
				<tr>
					<td>20. Pendidikan sebelumnya</td>
					<td></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; a. Tamatan dari</td>
					<td>: <?php echo $data['d1'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; b. Tanggal dan nomor ijazah</td>
					<td>: <?php echo $data['d2'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; c. Tanggal dan nomor STL/SKHUN</td>
					<td>: <?php echo $data['d3'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; d. Lama belajar</td>
					<td>: <?php echo $data['d4'] ?> tahun</td>
				</tr>
				<tr>
					<td>21. Pindahan</td>
					<td></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; a. Dari sekolah</td>
					<td>: <?php echo $data['d5'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; b. Alasan</td>
					<td>: <?php echo $data['d6'] ?></td>
				</tr>
				<tr>
					<td>22. Diterima di sekolah ini</td>
					<td></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; a. Di kelas</td>
					<td>: <?php echo $data['d7'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; b. Bidang keahlian</td>
					<td>: <?php echo $data['d8'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; c. Program keahlian</td>
					<td>: <?php echo $data['d9'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; d. Keahlian</td>
					<td>: <?php echo $data['d10'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; e. Tanggal/bulan/tahun</td>
					<td>: <?php echo $data['d11'] ?></td>
				</tr>

				<!-- E -->
				<tr>
					<th colspan="3">E. KETERANGAN TENTANG AYAH KANDUNG</th>
				</tr>
				<tr>
					<td>23. Nama</td>
					<td>: <?php echo $data['e1'] ?></td>
				</tr>
				<tr>
					<td>24. Tempat dan tanggal lahir</td>
					<td>: <?php echo $data['e2'] ?></td>
				</tr>
				<tr>
					<td>25. Agama</td>
					<td>: <?php echo $data['e3'] ?></td>
				</tr>
				<tr>
					<td>26. Kewajiban</td>
					<td>: <?php echo $data['e4'] ?></td>
				</tr>
				<tr>
					<td>27. Pendidikan</td>
					<td>: <?php echo $data['e5'] ?></td>
				</tr>
				<tr>
					<td>28. Pekerjaan</td>
					<td>: <?php echo $data['e6'] ?></td>
				</tr>
				<tr>
					<td>29. Pengeluaran perbulan</td>
					<td>: <?php echo $data['e7'] ?></td>
				</tr>
				<tr>
					<td>30. Alamat/rumah/nomor telp/HP</td>
					<td>: <?php echo $data['e8'] ?></td>
				</tr>
				<tr>
					<td>31. Masih hidup/meninggal dunia</td>
					<td>: <?php echo $data['e9'] ?></td>
				</tr>

				<!-- F -->
				<tr>
					<th colspan="3">F. KETERANGAN TENTANG IBU KANDUNG</th>
				</tr>
				<tr>
					<td>32. Nama</td>
					<td>: <?php echo $data['f1'] ?></td>
				</tr>
				<tr>
					<td>33. Tempat dan tanggal lahir</td>
					<td>: <?php echo $data['f2'] ?></td>
				</tr>
				<tr>
					<td>34. Agama</td>
					<td>: <?php echo $data['f3'] ?></td>
				</tr>
				<tr>
					<td>35. Kewajiban</td>
					<td>: <?php echo $data['f4'] ?></td>
				</tr>
				<tr>
					<td>36. Pendidikan</td>
					<td>: <?php echo $data['f5'] ?></td>
				</tr>
				<tr>
					<td>37. Pekerjaan</td>
					<td>: <?php echo $data['f6'] ?></td>
				</tr>
				<tr>
					<td>38. Pengeluaran perbulan</td>
					<td>: <?php echo $data['f7'] ?></td>
				</tr>
				<tr>
					<td>39. Alamat/rumah/nomor telp/HP</td>
					<td>: <?php echo $data['f8'] ?></td>
				</tr>
				<tr>
					<td>40. Masih hidup/meninggal dunia</td>
					<td>: <?php echo $data['f9'] ?></td>
				</tr>

				<!-- G -->
				<tr>
					<th colspan="3">G. KETERANGAN TENTANG WALI</th>
				</tr>
				<tr>
					<td>41. Nama</td>
					<td>: <?php echo $data['g1'] ?></td>
				</tr>
				<tr>
					<td>42. Tempat dan tanggal lahir</td>
					<td>: <?php echo $data['g2'] ?></td>
				</tr>
				<tr>
					<td>43. Agama</td>
					<td>: <?php echo $data['g3'] ?></td>
				</tr>
				<tr>
					<td>44. Kewajiban</td>
					<td>: <?php echo $data['g4'] ?></td>
				</tr>
				<tr>
					<td>45. Pendidikan</td>
					<td>: <?php echo $data['g5'] ?></td>
				</tr>
				<tr>
					<td>46. Pekerjaan</td>
					<td>: <?php echo $data['g6'] ?></td>
				</tr>
				<tr>
					<td>47. Pengeluaran perbulan</td>
					<td>: <?php echo $data['g7'] ?></td>
				</tr>
				<tr>
					<td>48. Alamat/rumah/nomor telp/HP</td>
					<td>: <?php echo $data['g8'] ?></td>
				</tr>
				
				<!-- H -->
				<tr>
					<th colspan="3">H. KEGEMARAN PESERTA DIDIK</th>
				</tr>
				<tr>
					<td>49. Kesenian</td>
					<td>: <?php echo $data['h1'] ?></td>
				</tr>
				<tr>
					<td>50. Olah raga</td>
					<td>: <?php echo $data['h2'] ?></td>
				</tr>
				<tr>
					<td>51. Kemasyarakatan/organisasi</td>
					<td>: <?php echo $data['h3'] ?></td>
				</tr>
				<tr>
					<td>52. Lain-lain</td>
					<td>: <?php echo $data['h4'] ?></td>
				</tr>

				<!-- I -->
				<tr>
					<th colspan="3">I. KETERANGAN PERKEMBANGAN PESERTA DIDIK</th>
				</tr>
				<tr>
					<td>53. Menerima bea siswa</td>
					<td>: Tahun <?php echo $data['i1'] ?> / Kls <?php echo $data['i2'] ?> dari <?php echo $data['i3'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>: Tahun <?php echo $data['i4'] ?> / Kls <?php echo $data['i5'] ?> dari <?php echo $data['i6'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>: Tahun <?php echo $data['i7'] ?> / Kls <?php echo $data['i8'] ?> dari <?php echo $data['i9'] ?></td>
				</tr>
				<tr>
					<td>54. Meninggalkan sekolah ini</td>
					<td></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; a. Tanggal meninggal sekolah</td>
					<td>: <?php echo $data['i10'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; b. Alasan</td>
					<td>: <?php echo $data['i11'] ?></td>
				</tr>
				<tr>
					<td>55. Akhir pendidikan</td>
					<td></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; a. Lulus</td>
					<td>: <?php echo $data['i12'] ?> Tahun</td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; b. Nomor/tanggal ijazah</td>
					<td>: <?php echo $data['i13'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; c. Nomor/tanggal SKHUN</td>
					<td>: <?php echo $data['i14'] ?></td>
				</tr>

				<!-- J -->
				<tr>
					<th colspan="3">J. KETERANGAN SETELAH SELESAI PENDIDIKAN</th>
				</tr>
				<tr>
					<td>56. Melanjutkan ke</td>
					<td>: <?php echo $data['j1'] ?></td>
				</tr>
				<tr>
					<td>57. Bekerja di</td>
					<td></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; a. Tanggal mulai bekerja</td>
					<td>: <?php echo $data['j2'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; b. Nama perusahaan/lembaga</td>
					<td>: <?php echo $data['j3'] ?></td>
				</tr>
				<tr>
					<td>&#160;&#160;&#160;&#160; c. Penghasilan</td>
					<td>: <?php echo $data['j4'] ?></td>
				</tr>

			</table>
		</div>
		<div class="col-md-2 col-xs-2">
			<br><br><br><br>

			<?php if ($data['k1'] == ''): ?>
				<img width="150" src="<?php echo base_url('assets/gambar/3x4.png') ?>">
			<?php else: ?>
				<img width="150" src="<?php echo base_url('assets/gambar/pribadi/'.$data['k1']) ?>">
			<?php endif ?>
			
			<h5 align="center"><small>waktu di terima di sekolah ini</small></h5>

			<div class="clearfix"></div>

			<br><br><br><br>
			<br><br><br><br>
			
			<?php if ($data['k1'] == ''): ?>
				<img width="150" src="<?php echo base_url('assets/gambar/3x4.png') ?>">
			<?php else: ?>
				<img width="150" src="<?php echo base_url('assets/gambar/pribadi/'.$data['k2']) ?>">
			<?php endif ?>

			<h5 align="center"><small>waktu meninggalkan sekolah ini</small></h5>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
 	window.print();
    window.onafterprint = back;

    function back() {
        window.history.back();
    }
</script>