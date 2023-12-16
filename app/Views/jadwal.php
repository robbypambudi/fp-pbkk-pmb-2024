<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">

	<!-- Heading Row -->
	<div class="row my-3">
		<div class="col-lg-12">
			<h1>Jadwal Penerimaan Mahasiswa Baru</h1>
			<div class="alert alert-info" role="alert">
				Penerimaan Kadet Mahasiswa ITS RI TA 2024/2025
			</div>
			<?php //echo $jadwal['jadwal']; 
			?>
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>No</th>
						<th>Kegiatan</th>
						<th>Tanggal</th>
						<th>Ket</th>
					</tr>
					<tr>
						<td>1</td>
						<td>Pendaftaran online</td>
						<td>14 Februari 2024 - 14 Maret 2024</td>
						<td>https://penerimaan.idu.ac.id</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Pengumuman Peserta Tes TPS/TPA & TOEFL</td>
						<td>23 Maret 2024</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>3</td>
						<td><i>Try Out</i> TPS/TPA & TOEFL</td>
						<td>29 Maret 2024</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Tes TPS/TPA</td>
						<td>30 Maret 2024</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Tes TOEFL</td>
						<td>31 Maret 2024</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>6</td>
						<td><i>Try Out</i> Tes Psikologi</td>
						<td>12 April 2024</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>7</td>
						<td>Tes Psikologi</td>
						<td>13 April 2024</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>8</td>
						<td>Pengumuman Hasil Tes TPS/TPA, TOEFL dan Psikologi</td>
						<td>22 April 2024</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>9</td>
						<td>Kedatangan Peserta Tes ke ITS</td>
						<td>1 Juni 2024</td>
						<td>Kampus ITS Jl Raya ITS </td>
					</tr>
					<tr>
						<td>10</td>
						<td>Tes MI Tertulis</td>
						<td>3 Juni 2024</td>
						<td>Kampus ITS Jl Raya ITS </td>
					</tr>
					<tr>
						<td>11</td>
						<td>Tes Rikes</td>
						<td>4 Juni 2024</td>
						<td>Kampus ITS Jl Raya ITS </td>
					</tr>
					<tr>
						<td>12</td>
						<td>Tes Keswa</td>
						<td>5 Juni 2024</td>
						<td>Kampus ITS Jl Raya ITS </td>
					</tr>
					<tr>
						<td>13</td>
						<td>Tes Wawancara Akademik dan MI</td>
						<td>6 - 8 Juni 2024</td>
						<td>Kampus ITS Jl Raya ITS </td>
					</tr>
					<tr>
						<td>14</td>
						<td>Pengumuman Kelulusan</td>
						<td>13 - 14 Juni 2024</td>
						<td>Kampus ITS Jl Raya ITS </td>
					</tr>
				</tbody>
			</table>
			<div class="alert alert-danger" role="alert">
				Jadwal sewaktu-waktu dapat berubah.
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>

<?= $this->endSection(); ?>