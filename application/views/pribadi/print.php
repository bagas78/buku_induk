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
		    line-height: 6px;
		}
  	</style>
</head>
<body style="font-size: 12px;">

	<h5 align="center"><b>LEMBAR BUKU INDUK PESERTA DIDIK</b></h5>
	<h6 align="center">NO. INDUK PESERTA NASIONAL / NO. INDUK SISWA SEKOLAH : <?php echo $x['user_nisn'].' / '.$x['user_nis'] ?></h6>

	<br/>

	<div class="row">
		<div class="col-md-10 col-xs-10">
			<table class="table table-borderless">

				<!-- A -->
				<tr>
					<th colspan="3">A. KETERANGAN TENTANG PESERTA DIDIK</th>
				</tr>
				<tr>
					<td width="1">1.</td>
					<td>Nama Lengkap Peserta Didik</td>
					<td>: <?php echo @$data['a1'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160; Nama Panggilan</td>
					<td>: <?php echo @$data['a2'] ?></td>
				</tr>
				<tr>
					<td>2.</td>
					<td>jenis Kelamin</td>
					<td>: <?php echo @$data['a3'] ?></td>
				</tr>
				<tr>
					<td>3. </td>
					<td>Tempat dan tanggal lahir</td>
					<td>: <?php echo @$data['a4'].', '.date_format(date_create(@$data['a5']), 'd M Y') ?></td>
				</tr>
				<tr>
					<td>4. </td>
					<td>Agama</td>
					<td>: <?php echo @$data['a6'] ?></td>
				</tr>
				<tr>
					<td>5. </td>
					<td>Kewarganegaraan</td>
					<td>: <?php echo @$data['a7'] ?></td>
				</tr>
				<tr>
					<td>6. </td>
					<td>Anak keberapa</td>
					<td>: <?php echo @$data['a8'] ?></td>
				</tr>
				<tr>
					<td>7. </td>
					<td>Jumlah saudara kandung</td>
					<td>: <?php echo @$data['a9'] ?></td>
				</tr>
				<tr>
					<td>8. </td>
					<td>Jumlah saudara tiri</td>
					<td>: <?php echo @$data['a10'] ?></td>
				</tr>
				<tr>
					<td>9. </td>
					<td>Jumlah saudara singkat</td>
					<td>: <?php echo @$data['a11'] ?></td>
				</tr>
				<tr>
					<td>10. </td>
					<td>Anak yatim/piatu/yatim piatu</td>
					<td>: <?php echo @$data['a12'] ?></td>
				</tr>
				<tr>
					<td>11. </td>
					<td>Bahasa sehari-hari di rumah</td>
					<td>: <?php echo @$data['a13'] ?></td>
				</tr>

				<!-- B -->
				<tr>
					<th colspan="3">B. KETERANGAN TEMPAT TINGGAL</th>
				</tr>
				<tr>
					<td>12. </td>
					<td>Alamat</td>
					<td>: <?php echo @$data['b1'] ?></td>
				</tr>
				<tr>
					<td>13. </td>
					<td>Nomor telepon/HP</td>
					<td>: <?php echo @$data['b2'] ?></td>
				</tr>
				<tr>
					<td>14. </td>
					<td>Tinggal dengan orang tua/saudara/di asmara/kost</td>
					<td>: <?php echo @$data['b3'] ?></td>
				</tr>
				<tr>
					<td>15. </td>
					<td>Jarak tempat tinggal ke sekolah</td>
					<td>: <?php echo @$data['b4'] ?> km</td>
				</tr>

				<!-- C -->
				<tr>
					<th colspan="3">C. KETERANGAN KESEHATAN</th>
				</tr>
				<tr>
					<td>16. </td>
					<td>Golongan darah</td>
					<td>: <?php echo @$data['c1'] ?></td>
				</tr>
				<tr>
					<td>17. </td>
					<td>Penyakit yang pernah di derita</td>
					<td>: <?php echo @$data['c2'] ?></td>
				</tr>
				<tr>
					<td>18. </td>
					<td>Kelainan jasmani</td>
					<td>: <?php echo @$data['c3'] ?></td>
				</tr>
				<tr>
					<td>19. </td>
					<td>Tinggi dan berat dan (saat diterima di sekolah ini)</td>
					<td>: <?php echo @$data['c4'] ?> cm</td>
				</tr>

				<!-- D -->
				<tr>
					<th colspan="3">D. KETERANGAN PENDIDIKAN</th>
				</tr>
				<tr>
					<td>20. </td>
					<td>Pendidikan sebelumnya</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; a. Tamatan dari</td>
					<td>: <?php echo @$data['d1'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; b. Tanggal dan nomor ijazah</td>
					<td>: <?php echo @$data['d2'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; c. Tanggal dan nomor STL/SKHUN</td>
					<td>: <?php echo @$data['d3'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; d. Lama belajar</td>
					<td>: <?php echo @$data['d4'] ?> tahun</td>
				</tr>
				<tr>
					<td>21. </td>
					<td>Pindahan</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; a. Dari sekolah</td>
					<td>: <?php echo @$data['d5'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; b. Alasan</td>
					<td>: <?php echo @$data['d6'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>22. Diterima di sekolah ini</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; a. Di kelas</td>
					<td>: <?php echo @$data['d7'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; b. Bidang keahlian</td>
					<td>: <?php echo @$data['d8'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; c. Program keahlian</td>
					<td>: <?php echo @$data['d9'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; d. Keahlian</td>
					<td>: <?php echo @$data['d10'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; e. Tanggal/bulan/tahun</td>
					<td>: <?php echo date_format(date_create(@$data['d11']), 'd/m/Y') ?></td>
				</tr>

				<!-- E -->
				<tr>
					<th colspan="3">E. KETERANGAN TENTANG AYAH KANDUNG</th>
				</tr>
				<tr>
					<td>23. </td>
					<td>Nama</td>
					<td>: <?php echo @$data['e1'] ?></td>
				</tr>
				<tr>
					<td>24. </td>
					<td>Tempat dan tanggal lahir</td>
					<td>: <?php echo @$data['e2'].', '.date_format(date_create(@$data['e3']), 'd M Y') ?></td>
				</tr>
				<tr>
					<td>25. </td>
					<td>Agama</td>
					<td>: <?php echo @$data['e4'] ?></td>
				</tr>
				<tr>
					<td>26. </td>
					<td>Kewarganegaraan</td>
					<td>: <?php echo @$data['e5'] ?></td>
				</tr>
				<tr>
					<td>27. </td>
					<td>Pendidikan</td>
					<td>: <?php echo @$data['e6'] ?></td>
				</tr>
				<tr>
					<td>28. </td>
					<td>Pekerjaan</td>
					<td>: <?php echo @$data['e7'] ?></td>
				</tr>
				<tr>
					<td>29. </td>
					<td>Pengeluaran perbulan</td>
					<td>: <?php echo @$data['e8'] ?></td>
				</tr>
				<tr>
					<td>30. </td>
					<td>Alamat/rumah/nomor telp/HP</td>
					<td>: <?php echo @$data['e9'] ?></td>
				</tr>
				<tr>
					<td>31. </td>
					<td>Masih hidup/meninggal dunia</td>
					<td>: <?php echo @$data['e10'] ?></td>
				</tr>

				<!-- F -->
				<tr>
					<th colspan="3">F. KETERANGAN TENTANG IBU KANDUNG</th>
				</tr>
				<tr>
					<td>32. </td>
					<td>Nama</td>
					<td>: <?php echo @$data['f1'] ?></td>
				</tr>
				<tr>
					<td>33. </td>
					<td>Tempat dan tanggal lahir</td>
					<td>: <?php echo @$data['f2'].', '.date_format(date_create(@$data['f3']),'d M Y') ?></td>
				</tr>
				<tr>
					<td>34. </td>
					<td>Agama</td>
					<td>: <?php echo @$data['f4'] ?></td>
				</tr>
				<tr>
					<td>35. </td>
					<td>Kewajiban</td>
					<td>: <?php echo @$data['f5'] ?></td>
				</tr>
				<tr>
					<td>36. </td>
					<td>Pendidikan</td>
					<td>: <?php echo @$data['f6'] ?></td>
				</tr>
				<tr>
					<td>37. </td>
					<td>Pekerjaan</td>
					<td>: <?php echo @$data['f7'] ?></td>
				</tr>
				<tr>
					<td>38. </td>
					<td>Pengeluaran perbulan</td>
					<td>: <?php echo @$data['f8'] ?></td>
				</tr>
				<tr>
					<td>39. </td>
					<td>Alamat/rumah/nomor telp/HP</td>
					<td>: <?php echo @$data['f9'] ?></td>
				</tr>
				<tr>
					<td>40. </td>
					<td>Masih hidup/meninggal dunia</td>
					<td>: <?php echo @$data['f10'] ?></td>
				</tr>

				<!-- G -->
				<tr>
					<th colspan="3">G. KETERANGAN TENTANG WALI</th>
				</tr>
				<tr>
					<td>41. </td>
					<td>Nama</td>
					<td>: <?php echo @$data['g1'] ?></td>
				</tr>
				<tr>
					<td>42. </td>
					<td>Tempat dan tanggal lahir</td>
					<td>: <?php echo @$data['g2'].', '.date_format(date_create(@$data['g3']), 'd M Y') ?></td>
				</tr>
				<tr>
					<td>43. </td>
					<td>Agama</td>
					<td>: <?php echo @$data['g4'] ?></td>
				</tr>
				<tr>
					<td>44. </td>
					<td>Kewajiban</td>
					<td>: <?php echo @$data['g5'] ?></td>
				</tr>
				<tr>
					<td>45. </td>
					<td>Pendidikan</td>
					<td>: <?php echo @$data['g6'] ?></td>
				</tr>
				<tr>
					<td>46. </td>
					<td>Pekerjaan</td>
					<td>: <?php echo @$data['g7'] ?></td>
				</tr>
				<tr>
					<td>47. </td>
					<td>Pengeluaran perbulan</td>
					<td>: <?php echo @$data['g8'] ?></td>
				</tr>
				<tr>
					<td>48. </td>
					<td>Alamat/rumah/nomor telp/HP</td>
					<td>: <?php echo @$data['g9'] ?></td>
				</tr>
				
				<!-- H -->
				<tr>
					<th colspan="3">H. KEGEMARAN PESERTA DIDIK</th>
				</tr>
				<tr>
					<td>49. </td>
					<td>Kesenian</td>
					<td>: <?php echo @$data['h1'] ?></td>
				</tr>
				<tr>
					<td>50. </td>
					<td>Olah raga</td>
					<td>: <?php echo @$data['h2'] ?></td>
				</tr>
				<tr>
					<td>51. </td>
					<td>Kemasyarakatan/organisasi</td>
					<td>: <?php echo @$data['h3'] ?></td>
				</tr>
				<tr>
					<td>52. </td>
					<td>Lain-lain</td>
					<td>: <?php echo @$data['h4'] ?></td>
				</tr>

				<!-- I -->
				<tr>
					<th colspan="3">I. KETERANGAN PERKEMBANGAN PESERTA DIDIK</th>
				</tr>
				<tr>
					<td>53. </td>
					<td>Menerima bea siswa</td>
					<td>: Tahun <?php echo @$data['i1'] ?> / Kls <?php echo @$data['i2'] ?> dari <?php echo @$data['i3'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>: Tahun <?php echo @$data['i4'] ?> / Kls <?php echo @$data['i5'] ?> dari <?php echo @$data['i6'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>: Tahun <?php echo @$data['i7'] ?> / Kls <?php echo @$data['i8'] ?> dari <?php echo @$data['i9'] ?></td>
				</tr>
				<tr>
					<td>54. </td>
					<td>Meninggalkan sekolah ini</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; a. Tanggal meninggal sekolah</td>
					<td>: <?php echo date_format(date_create(@$data['i10']), 'd/m/Y') ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; b. Alasan</td>
					<td>: <?php echo @$data['i11'] ?></td>
				</tr>
				<tr>
					<td>55. </td>
					<td>Akhir pendidikan</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; a. Lulus</td>
					<td>: <?php echo @$data['i12'] ?> Tahun</td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; b. Nomor/tanggal ijazah</td>
					<td>: <?php echo @$data['i13'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; c. Nomor/tanggal SKHUN</td>
					<td>: <?php echo @$data['i14'] ?></td>
				</tr>

				<!-- J -->
				<tr>
					<th colspan="3">J. KETERANGAN SETELAH SELESAI PENDIDIKAN</th>
				</tr>
				<tr>
					<td>56. </td>
					<td>Melanjutkan ke</td>
					<td>: <?php echo @$data['j1'] ?></td>
				</tr>
				<tr>
					<td>57. </td>
					<td>Bekerja di</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; a. Tanggal mulai bekerja</td>
					<td>: <?php echo date_format(date_create(@$data['j2']), 'd/m/Y') ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; b. Nama perusahaan/lembaga</td>
					<td>: <?php echo @$data['j3'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td>&#160;&#160;&#160;&#160; c. Penghasilan</td>
					<td>: <?php echo @$data['j4'] ?></td>
				</tr>

			</table>
		</div>
		<div class="col-md-2 col-xs-2" align="center">
			<br><br>

			<?php if (@$data['k1'] == ''): ?>
				<img width="100" src="<?php echo base_url('assets/gambar/3x4.png') ?>">
			<?php else: ?>
				<img width="100" src="<?php echo base_url('assets/gambar/pribadi/'.@$data['k1']) ?>">
			<?php endif ?>
			
			<h6 align="center">waktu di terima di sekolah ini</h6>

			<div class="clearfix"></div>

			<br><br>
			<br><br>
			
			<?php if (@$data['k1'] == ''): ?>
				<img width="100" src="<?php echo base_url('assets/gambar/3x4.png') ?>">
			<?php else: ?>
				<img width="100" src="<?php echo base_url('assets/gambar/pribadi/'.@$data['k2']) ?>">
			<?php endif ?>

			<h6 align="center">waktu meninggalkan sekolah ini</h6>
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