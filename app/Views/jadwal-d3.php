<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">

	<!-- Heading Row -->
	<div class="row my-3">
		<div class="col-lg-12">
			<div class="alert alert-info" role="alert">
				<h3>Jadwal Penerimaan Program Vokasi/D3 TA. 2022/2023</h3>
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
						<td>1 Mei 2022 - 5 Juni 2022</td>
						<td>https://penerimaan.idu.ac.id</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Pengumuman Peserta Tes TPS/TPA, TOEFL & Psikologi</td>
						<td>9 Juni 2022</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>3</td>
						<td><i>Try Out</i> TPS/TPA & TOEFL</td>
						<td>13 Juni 2022</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Tes TPS/TPA</td>
						<td>14 Juni 2022</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Tes TOEFL</td>
						<td>15 Juni 2022</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>6</td>
						<td><i>Try Out</i> Tes Psikologi</td>
						<td>27 Juni 2022</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>7</td>
						<td>Tes Psikologi</td>
						<td>28 Juni 2022</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>8</td>
						<td>Pengumuman Hasil Tes TPS/TPA, TOEFL dan Psikologi</td>
						<td>6 Juli 2022</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>9</td>
						<td>Kedatangan Peserta Tes ke Kampus</td>
						<td>14 Juli 2022</td>
						<td></td>
					</tr>
					<tr>
						<td>10</td>
						<td>Tes MI Tertulis</td>
						<td>15 Juli 2022</td>
						<td></td>
					</tr>
					<tr>
						<td>11</td>
						<td>Tes Rikes</td>
						<td>16 Juli 2022</td>
						<td></td>
					</tr>
					<tr>
						<td>12</td>
						<td>Tes Keswa</td>
						<td>17 Juli 2022</td>
						<td></td>
					</tr>
					<tr>
						<td>13</td>
						<td>Tes Wawancara Akademik dan MI</td>
						<td>18 - 20 Juli 2022</td>
						<td></td>
					</tr>
					<tr>
						<td>14</td>
						<td>Pengumuman Kelulusan</td>
						<td>21 Juli 2022</td>
						<td></td>
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