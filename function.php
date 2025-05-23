<?php
// database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vacsin_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get vaccination statistics
function getVaccinationStats() {
    global $conn;
    
    $stats = array(
        'dosis1' => '91.55',
        'dosis2' => '69.03',
        'dosis3' => '4.71'
    );
    
    // In a real application, you would fetch this data from a database
    // Example query: SELECT * FROM vaccination_stats WHERE is_current = 1
    
    return $stats;
}

// Function to get vaccination benefits
function getVaccinationBenefits() {
    $benefits = array(
        array(
            'id' => 1,
            'title' => 'Merangsang Sistem Kekebalan Tubuh',
            'description' => 'Vaksin membantu tubuh mengenali virus dan bakteri berbahaya sehingga sistem kekebalan tubuh dapat mempersiapkan diri untuk melawan infeksi.'
        ),
        array(
            'id' => 2,
            'title' => 'Mengurangi Risiko Penularan',
            'description' => 'Vaksinasi dapat mengurangi kemungkinan terinfeksi COVID-19 dan meminimalkan risiko penularan virus kepada orang lain.'
        ),
        array(
            'id' => 3,
            'title' => 'Mengurangi Dampak Berat Dari Virus',
            'description' => 'Meskipun masih mungkin terinfeksi setelah vaksinasi, gejala yang dialami cenderung lebih ringan dan risiko perawatan rumah sakit atau kematian berkurang secara signifikan.'
        ),
        array(
            'id' => 4,
            'title' => 'Mencapai Herd Immunity',
            'description' => 'Ketika sebagian besar populasi telah divaksinasi, penyebaran virus dapat terhambat dan melindungi mereka yang tidak dapat divaksinasi karena alasan medis.'
        )
    );
    
    return $benefits;
}

// Function to get patient rules
function getPatientRules() {
    $rules = array(
        array(
            'id' => 1,
            'title' => 'Tekanan Darah Harus Normal',
            'description' => 'Apabila saat skrining kesehatan kamu memiliki tekanan darah diatas 180/110, atau memiliki riwayat hipertensi artinya vaksinasi tidak dapat diberikan.'
        ),
        array(
            'id' => 2,
            'title' => 'Hindari Alkohol',
            'description' => 'Hal ini penting dilakukan agar sistem imun Anda tetap kuat dan dapat menghasilkan reaksi kekebalan tubuh yang baik untuk mencegah infeksi virus Corona.'
        ),
        array(
            'id' => 3,
            'title' => 'Tidur yang cukup',
            'description' => 'Beberapa hari sebelum disuntik vaksin COVID-19, usahakan untuk tidak begadang dan cukupi waktu istirahat dengan tidur selama 7-9 jam setiap malamnya.'
        ),
        array(
            'id' => 4,
            'title' => 'Informasikan kondisi kesehatan dini',
            'description' => 'Beri tahu dokter atau petugas vaksinasi COVID-19 mengenai kondisi kesehatan Anda saat hendak divaksin, seperti: Demam, Penyakit tertentu, Konsumsi obat-obatan tertentu.'
        )
    );
    
    return $rules;
}

// Function to get vaccine variants
function getVaccineVariants() {
    $variants = array(
        array(
            'id' => 1,
            'name' => 'AstraZeneca',
            'image' => 'img/astrazeneca.png',
            'short_desc' => 'Vaksin Sinovac menggunakan virus tidak aktif (inacative virus. Jarak pemberian vaksin...',
            'full_desc' => 'Vaksin AstraZeneca menggunakan teknologi vektor virus yang telah dimodifikasi dan tidak dapat bereplikasi. Vaksin ini diberikan dalam dua dosis dengan interval 8-12 minggu. Efikasi vaksin mencapai 70% dalam mencegah gejala COVID-19 dan 100% untuk mencegah kematian.',
            'slug' => 'astrazeneca'
        ),
        array(
            'id' => 2,
            'name' => 'Sinovac',
            'image' => 'img/sinovac.png',
            'short_desc' => 'Vaksin Sinovac menggunakan virus tidak aktif (inacative virus. Jarak pemberian vaksin...',
            'full_desc' => 'Vaksin Sinovac menggunakan platform virus inaktif (inactivated virus). Virus SARS-CoV-2 dimatikan sehingga tidak dapat berkembang biak tetapi masih dapat memicu respons imun. Diberikan dalam dua dosis dengan interval 14-28 hari. Efikasi vaksin berkisar antara 50-91% tergantung pada studi klinis di berbagai negara.',
            'slug' => 'sinovac'
        ),
        array(
            'id' => 3,
            'name' => 'Moderna',
            'image' => 'img/moderna.png',
            'short_desc' => 'Vaksin Sinovac menggunakan virus tidak aktif (inacative virus. Jarak pemberian vaksin...',
            'full_desc' => 'Vaksin Moderna menggunakan teknologi mRNA yang memberikan instruksi kepada sel untuk membuat protein spike yang memicu respons imun. Diberikan dalam dua dosis dengan interval 28 hari. Efikasi vaksin mencapai 94.1% dalam mencegah COVID-19 dan hampir 100% dalam mencegah kasus berat.',
            'slug' => 'moderna'
        )
    );
    
    return $variants;
}

// Function to get testimonials
function getTestimonials() {
    $testimonials = array(
        array(
            'id' => 1,
            'name' => 'Steve John',
            'job' => 'Pegawai Swasta',
            'image' => 'img/steve.jpg',
            'quote' => 'Sebelum divaksin sebaiknya ketahui sendiri vaksin dan keuntungan menggunakannya'
        ),
        array(
            'id' => 2,
            'name' => 'Clara Ren',
            'job' => 'Pegawai Swasta',
            'image' => 'img/clara.jpg',
            'quote' => 'Sebelum divaksin sebaiknya ketahui sendiri vaksin dan keuntungan menggunakannya'
        ),
        array(
            'id' => 3,
            'name' => 'Steve John',
            'job' => 'Pegawai Swasta',
            'image' => 'img/steve.jpg',
            'quote' => 'Sebelum divaksin sebaiknya ketahui sendiri vaksin dan keuntungan menggunakannya'
        )
    );
    
    return $testimonials;
}

// Function to get vaccination locations
function getVaccinationLocations() {
    $locations = array(
        array(
            'id' => 1,
            'name' => 'Rumah Sakit Umum Pusat Dr. Cipto Mangunkusumo',
            'address' => 'Jl. Diponegoro No. 71, Jakarta Pusat',
            'phone' => '(021) 31902626',
            'schedule' => 'Senin-Jumat, 08.00-14.00'
        ),
        array(
            'id' => 2,
            'name' => 'Puskesmas Kecamatan Menteng',
            'address' => 'Jl. Pegangsaan Barat No. 3, Menteng, Jakarta Pusat',
            'phone' => '(021) 31922989',
            'schedule' => 'Senin-Sabtu, 08.00-12.00'
        ),
        array(
            'id' => 3,
            'name' => 'RS Pondok Indah',
            'address' => 'Jl. Metro Duta Kav. UE, Pondok Indah, Jakarta Selatan',
            'phone' => '(021) 7657525',
            'schedule' => 'Senin-Minggu, 08.00-16.00'
        )
    );
    
    return $locations;
}

// Process registration form
function processRegistration($data) {
    global $conn;
    
    $name = $data['name'];
    $nik = $data['nik'];
    $phone = $data['phone'];
    $email = $data['email'];
    $address = $data['address'];
    $dob = $data['dob'];
    $location_id = $data['location_id'];
    $schedule_date = $data['schedule_date'];
    $vaccine_id = $data['vaccine_id'];
    
    // In a real application, you would insert this data into a database
    // Example query: INSERT INTO registrations (name, nik, phone, email, address, dob, location_id, schedule_date, vaccine_id, created_at) 
    // VALUES ('$name', '$nik', '$phone', '$email', '$address', '$dob', $location_id, '$schedule_date', $vaccine_id, NOW())
    
    // For demonstration purposes, return a registration ID
    return rand(1000000, 9999999);
}

// Get the current page
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>