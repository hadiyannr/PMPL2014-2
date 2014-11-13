<?php
/* @var $this ProfilController */
/* @var $model Profil */
?>

<select name="Profil[targetJurusan]" id="daftarJurusan" onchange="" size="1">
    <?php
    $jurusans = array("ARSITEKTUR",
        "ARSITEKTUR INTERIOR",
        "BIOLOGI",
        "FARMASI",
        "FISIKA",
        "GEOGRAFI",
        "GIZI",
        "ILMU KEPERAWATAN",
        "ILMU KESEHATAN MASYARAKAT",
        "ILMU KOMPUTER",
        "KIMIA",
        "MATEMATIKA",
        "PENDIDIKAN DOKTER",
        "PENDIDIKAN DOKTER GIGI",
        "SISTEM INFORMASI",
        "TEKNIK ELEKTRO",
        "TEKNIK INDUSTRI",
        "TEKNIK KIMIA",
        "TEKNIK KOMPUTER",
        "TEKNIK LINGKUNGAN",
        "TEKNIK MESIN",
        "TEKNIK METALURGI & MATERIAL",
        "TEKNIK PERKAPALAN",
        "TEKNIKSIPIL",
        "TEKNOLOGI BIOPROSES",
        "AKUNTANSI",
        "ANTROPOLOGI SOSIAL",
        "ARKEOLOGI INDONESIA",
        "BAHASA DAN KEBUDAYAAN KOREA",
        "ILMU ADMINISTRASI FISKAL",
        "ILMU ADMINISTRASI NEGARA",
        "ILMU ADMINISTRASI NIAGA",
        "ILMU EKONOMI",
        "ILMU EKONOMI ISLAM",
        "ILMU FILSAFAT",
        "ILMU HUBUNGAN INTERNASIONAL",
        "ILMU HUKUM",
        "ILMU KESEJAHTERAAN SOSIAL",
        "ILMU KOMUNIKASI",
        "ILMU PERPUSTAKAAN",
        "ILMU POLITIK",
        "ILMU PSIKOLOGI",
        "ILMU SEJARAH",
        "KRIMINOLOGI",
        "MANAJEMEN",
        "SASTRA ARAB",
        "SASTRA BELANDA",
        "SASTRA CINA",
        "SASTRA DAERAH UNTUK SASTRA JAWA",
        "SASTRA INDONESIA",
        "SASTRA INGGRIS",
        "SASTRA JEPANG",
        "SASTRA JERMAN",
        "SASTRA PERANCIS",
        "SASTRA RUSIA",
        "SOSIOLOGI");
        foreach($jurusans as $jurusan){
            $check = ($jurusan == $model->targetJurusan)?"selected":"";
            echo '<option value="'.$jurusan.'" '.$check.'>'.$jurusan.'</option>';
        }
    ?>
</select>