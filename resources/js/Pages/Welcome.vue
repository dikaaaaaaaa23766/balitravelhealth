<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { onMounted } from 'vue';

interface GeneralArticle {
  id: number;
  title: string;
  summary: string;
  cover_image: string;
  slug: string;
}

defineProps<{
  canLogin?: boolean;
  canRegister?: boolean;
  laravelVersion: string;
  phpVersion: string;
  generalArticles: GeneralArticle[];
}>();

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add('fade-in-up');
    }
  });
}, { threshold: 0.1 });

onMounted(() => {
  const animatedElements = document.querySelectorAll('.animate-on-scroll');
  animatedElements.forEach((el) => observer.observe(el));
});
</script>

<template>
  <Head title="Welcome - Wisata Bali" />
  <div class="min-h-screen relative">
    <!-- Background -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0');"></div>
    <div class="absolute inset-0 bg-black bg-opacity-60 backdrop-blur-sm"></div>

    <div class="relative z-10 container mx-auto p-6 lg:p-8 text-white">
      <!-- Header -->
      <header class="flex justify-between items-center py-6">
        <Link :href="route('welcome')" class="flex items-center gap-3">
          <svg class="h-10 w-auto text-cyan-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M12 2.25a9.75 9.75 0 100 19.5 9.75 9.75 0 000-19.5zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd"/>
          </svg>
          <span class="text-2xl font-bold">Wisata Bali</span>
        </Link>

        <nav v-if="canLogin" class="flex items-center gap-4">
          <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="btn-primary px-4 py-2 rounded-md text-sm font-semibold">Dashboard</Link>
          <template v-else>
            <Link :href="route('login')" class="btn-secondary px-4 py-2 rounded-md text-sm font-semibold">Log in</Link>
            <Link v-if="canRegister" :href="route('register')" class="btn-primary px-4 py-2 rounded-md text-sm font-semibold">Register</Link>
          </template>
        </nav>
      </header>

      <!-- Fitur Unggulan -->
      <main class="mt-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Panduan Medis -->
          <Link :href="route('medical-guide.index')" class="glass-effect card-hover-effect group rounded-xl p-6 shadow-2xl shadow-cyan-500/10 animate-on-scroll">
            <div class="flex items-center gap-4 mb-4">
              <div class="h-12 w-12 bg-cyan-500/20 rounded-lg flex items-center justify-center">
                <svg class="h-6 w-6 text-cyan-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
              </div>
              <h2 class="text-xl font-semibold">Panduan Medis</h2>
            </div>
            <p class="text-blue-100">Temukan informasi kesehatan penting dan panduan pertolongan pertama untuk perjalanan Anda.</p>
          </Link>

          <!-- Klinik -->
          <Link href="#" class="glass-effect card-hover-effect group rounded-xl p-6 shadow-2xl shadow-cyan-500/10 animate-on-scroll" style="animation-delay: 100ms;">
            <div class="flex items-center gap-4 mb-4">
              <div class="h-12 w-12 bg-cyan-500/20 rounded-lg flex items-center justify-center">
                <svg class="h-6 w-6 text-cyan-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
              </div>
              <h2 class="text-xl font-semibold">Klinik & RS Terdekat</h2>
            </div>
            <p class="text-blue-100">Temukan dokter, klinik, dan rumah sakit terdekat dengan cepat.</p>
          </Link>

          <!-- Tips Aman -->
          <Link href="#" class="glass-effect card-hover-effect group rounded-xl p-6 shadow-2xl shadow-cyan-500/10 animate-on-scroll" style="animation-delay: 200ms;">
            <div class="flex items-center gap-4 mb-4">
              <div class="h-12 w-12 bg-cyan-500/20 rounded-lg flex items-center justify-center">
                <svg class="h-6 w-6 text-cyan-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 20.417l4.5-3.066A11.95 11.95 0 0112 18c2.683 0 5.18-.93 7.118-2.457l4.5 3.066A12.02 12.02 0 0021 8.944a11.955 11.955 0 01-2.382-3.016z"/>
                </svg>
              </div>
              <h2 class="text-xl font-semibold">Tips Aman Berwisata</h2>
            </div>
            <p class="text-blue-100">Kumpulan panduan dan tips agar perjalanan Anda tetap aman dan nyaman.</p>
          </Link>
        </div>
      </main>

      <!-- Artikel -->
      <section class="mt-24">
        <div class="text-center mb-12 animate-on-scroll">
          <h2 class="text-3xl font-extrabold sm:text-4xl">Artikel & Informasi Umum</h2>
          <p class="mt-4 text-lg text-blue-100">Informasi bermanfaat untuk perjalanan Anda di Bali.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          <div v-for="(article, index) in generalArticles" :key="article.id"
            class="glass-effect feature-card flex flex-col text-left rounded-lg animate-on-scroll"
            :style="{ animationDelay: `${index * 100}ms` }">
            <img v-if="article.cover_image" :src="`/storage/${article.cover_image}`" :alt="article.title" class="w-full h-40 object-cover rounded-t-lg">
            <div class="p-6 flex flex-col flex-grow">
              <h3 class="text-lg font-semibold mb-2">{{ article.title }}</h3>
              <p class="text-blue-100 text-sm flex-grow line-clamp-3">{{ article.summary }}</p>
              <Link :href="route('general-article.show', article.slug)" class="text-cyan-200 hover:text-cyan-100 font-semibold mt-4 self-start">
                Klik untuk selengkapnya →
              </Link>
            </div>
          </div>
        </div>
      </section>

      <!-- Footer -->
      <footer class="mt-24 text-center text-sm text-blue-100">
        Wisata Bali (Laravel v{{ laravelVersion }} - PHP v{{ phpVersion }})
      </footer>
    </div>
  </div>
</template>

<style>
.glass-effect {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(56, 189, 248, 0.3);
}

.card-hover-effect:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 0 0 1px #0ea5e9;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.feature-card:hover {
  background-color: rgba(56, 189, 248, 0.15);
  transform: scale(1.03);
}

.btn-primary {
  background-color: #0ea5e9;
  color: white;
}

.btn-primary:hover {
  background-color: #0284c7;
}

.btn-secondary {
  border: 1px solid #0ea5e9;
  color: #0ea5e9;
}

.btn-secondary:hover {
  background-color: #0ea5e9;
  color: white;
}

.animate-on-scroll {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.animate-on-scroll.fade-in-up {
  opacity: 1;
  transform: translateY(0);
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
