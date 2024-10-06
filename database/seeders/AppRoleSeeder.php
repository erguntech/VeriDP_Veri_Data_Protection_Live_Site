<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AppRoleSeeder extends Seeder
{
    public function run(): void
    {

        // Roller
        $roleAdmin = Role::create(['name' => 'Sistem Yöneticisi', 'description' => 'Sistem Yöneticisi Rolü', 'created_by' => '1']); // Admin
        $roleAdminUser = Role::create(['name' => 'Sistem Kullanıcısı', 'description' => 'Sistem Kullanıcısı Rolü', 'created_by' => '1']); // Admin User
        $roleClient = Role::create(['name' => 'Şirket Yöneticisi', 'description' => 'Şirket Yöneticisi Rolü', 'created_by' => '1']); // Client
        $roleClientUser = Role::create(['name' => 'Şirket Kullanıcısı', 'description' => 'Şirket Kullanıcısı Rolü', 'created_by' => '1']); // Client User

        // Genel İzinler
        $permission00_01 = Permission::create(['name' => 'Genel Ayarları Düzenleme', 'description' => 'Genel Ayarları Düzenleme İzni', 'created_by' => '1']); // Admin

        // Sistem Yönetimi
        $permission01_01 = Permission::create(['name' => 'Kullanıcıları Görüntüleme', 'description' => 'Kullanıcıları Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission01_02 = Permission::create(['name' => 'Kullanıcı Rollerini Görüntüleme', 'description' => 'Kullanıcı Rollerini Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission01_03 = Permission::create(['name' => 'Kullanıcı İzinlerini Görüntüleme', 'description' => 'Kullanıcı İzinlerini Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission01_04 = Permission::create(['name' => 'Kullanıcı Hareketlerini Görüntüleme', 'description' => 'Kullanıcı Hareketlerini Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission01_05 = Permission::create(['name' => 'Sistem Ayarlarını Düzenleme', 'description' => 'Sistem Ayarlarını Düzenleme İzni', 'created_by' => '1']); // Admin

        // Müşteri Yönetimi
        $permission02_01 = Permission::create(['name' => 'Müşterileri Görüntüleme', 'description' => 'Müşterileri Görüntüleme İzni', 'created_by' => '1']); // Admin

        // Şirket Yönetimi
        $permission03_02 = Permission::create(['name' => 'Departmanları Görüntüleme', 'description' => 'Departmanları Görüntüleme İzni', 'created_by' => '1']); // Client
        $permission03_03 = Permission::create(['name' => 'Personelleri Görüntüleme', 'description' => 'Personelleri Görüntüleme İzni', 'created_by' => '1']); // Client
        $permission03_04 = Permission::create(['name' => 'Organizasyon Şeması Görüntüleme', 'description' => 'Organizasyon Şeması Görüntüleme İzni', 'created_by' => '1']); // Client

        // KVKK Danışan Sistemi
        $permission04_01 = Permission::create(['name' => 'Doküman Yönetimi Görüntüleme', 'description' => 'Doküman Yönetimi Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission04_02 = Permission::create(['name' => 'KVKK Dokümanlarını Görüntüleme', 'description' => 'KVKK Dokümanlarını Görüntüleme İzni', 'created_by' => '1']); // Client

        // KVKK Denetim Sistemi
        $permission05_01 = Permission::create(['name' => 'Denetim Yönetimi Görüntüleme', 'description' => 'Şirket Denetim Yönetimi Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission05_02 = Permission::create(['name' => 'Denetim Raporlarını Görüntüleme', 'description' => 'Denetim Raporlarını Görüntüleme İzni', 'created_by' => '1']); // Client

        // KVKK Akademi
        $permission06_01 = Permission::create(['name' => 'Akademi Yönetimi Görüntüleme', 'description' => 'Akademi Yönetimi Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission06_02 = Permission::create(['name' => 'Eğitim Dokümanlarını Görüntüleme', 'description' => 'Eğitim Sunumlarını Görüntüleme İzni', 'created_by' => '1']); // Client
        $permission06_03 = Permission::create(['name' => 'Eğitim Sunumlarını Görüntüleme', 'description' => 'Eğitim Sunumlarını Görüntüleme İzni', 'created_by' => '1']); // Client
        $permission06_04 = Permission::create(['name' => 'Eğitim Videolarını Görüntüleme', 'description' => 'Eğitim Videolarını Görüntüleme İzni', 'created_by' => '1']); // Client

        // KVKK Uyum Testi
        $permission07_01 = Permission::create(['name' => 'Uyum Testi Yönetimi Görüntüleme', 'description' => 'Uyum Testi Yönetimi Görüntüleme İzni', 'created_by' => '1']); // Admin

        // Web KOD Altyapısı
        $permission08_01 = Permission::create(['name' => 'Web Kod Altyapısı Görüntüleme', 'description' => 'Web Kod Altyapısı Görüntüleme İzni', 'created_by' => '1']); // Client

        // KVKK Mevzuat Modülleri
        $permission09_01 = Permission::create(['name' => 'Mevzuat Yönetimi Görüntüleme', 'description' => 'Mevzuat Yönetimi Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission09_02 = Permission::create(['name' => 'Kişisel Verilerin Korunması Kanununu Görüntüleme', 'description' => 'Kişisel Verilerin Korunması Kanununu Görüntüleme İzni', 'created_by' => '1']); // Client
        $permission09_03 = Permission::create(['name' => 'KVKK Kurul Kararlarını Görüntüleme', 'description' => 'KVKK Kurul Kararlarını Görüntüleme İzni', 'created_by' => '1']); // Client
        $permission09_04 = Permission::create(['name' => 'KVKK İlke Kararlarını Görüntüleme', 'description' => 'KVKK İlke Kararlarını Görüntüleme İzni', 'created_by' => '1']); // Client
        $permission09_05 = Permission::create(['name' => 'KVKK Yönetmeliklerini Görüntüleme', 'description' => 'KVKK İlke Kararlarını Görüntüleme İzni', 'created_by' => '1']); // Client
        $permission09_06 = Permission::create(['name' => 'KVKK Tebliğlerini Görüntüleme', 'description' => 'KVKK Tebliğlerini Görüntüleme İzni', 'created_by' => '1']); // Client
        $permission09_07 = Permission::create(['name' => 'KVKK Taahhütnamelerini Görüntüleme', 'description' => 'KVKK Taahhütnamelerini Görüntüleme İzni', 'created_by' => '1']); // Client

        // KVKK Envanter Yönetimi
        $permission10_01 = Permission::create(['name' => 'Veri Kategorilerini Görüntüleme', 'description' => 'Veri Kategorilerini Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission10_02 = Permission::create(['name' => 'Veri Türlerini Görüntüleme', 'description' => 'Veri Türlerini Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission10_03 = Permission::create(['name' => 'İdari ve Teknik Tedbirleri Görüntüleme', 'description' => 'İdari ve Teknik Tedbirleri Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission10_04 = Permission::create(['name' => 'Veri Setlerini Görüntüleme', 'description' => 'Veri Setlerini Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission10_05 = Permission::create(['name' => 'Envanter Oluşturmayı Görüntüleme', 'description' => 'Envanter Oluşturmayı Görüntüleme İzni', 'created_by' => '1']); // Admin
        $permission10_06 = Permission::create(['name' => 'Veri İşleme Amaçlarını Görüntüleme', 'description' => 'Veri İşleme Amaçlarını Görüntüleme İzni', 'created_by' => '1']); // Admin


        // İzin Rol Bağlantısı
        $roleAdmin->givePermissionTo(
            $permission00_01, $permission01_01, $permission01_02, $permission01_03, $permission01_04, $permission01_05,
            $permission02_01,
            $permission04_01,
            $permission05_01,
            $permission06_01,
            $permission07_01,
            $permission09_01,
            $permission10_01, $permission10_02, $permission10_03, $permission10_06
        );

        $roleAdminUser->givePermissionTo(
            $permission00_01
        );

        $roleClient->givePermissionTo(
            $permission00_01,
            $permission03_02, $permission03_03, $permission03_04,
            $permission04_02,
            $permission05_02,
            $permission06_02, $permission06_03, $permission06_04,
            $permission08_01,
            $permission09_02, $permission09_03, $permission09_04, $permission09_05, $permission09_06, $permission09_07,
            $permission10_04, $permission10_05
        );

        $roleClientUser->givePermissionTo(
            $permission00_01,
            $permission06_02, $permission06_03, $permission06_04,
            $permission09_02, $permission09_03, $permission09_04, $permission09_05, $permission09_06, $permission09_07
        );
    }
}
