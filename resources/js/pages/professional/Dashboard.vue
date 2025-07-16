<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';

const page = usePage();

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/professional/dashboard',
  },
];
</script>

<template>
  <Head title="Dashboard" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-6 space-y-8">

      <!-- Boas-vindas -->
      <div>
        <h1 class="text-3xl font-semibold">Olá, {{ page.props.auth.user.name }}</h1>
        <p class="text-gray-500">Hoje é {{ page.props.data_hoje }}</p>
      </div>

      <!-- Resumo Rápido -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl p-5 shadow-sm flex flex-col gap-2">
          <span class="text-sm text-gray-500">Atendimentos hoje</span>
          <h2 class="text-2xl font-bold">5</h2>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm flex flex-col gap-2">
          <span class="text-sm text-gray-500">Próximo agendamento</span>
          <h2 class="text-2xl font-bold">14:30h</h2>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm flex flex-col gap-2">
          <span class="text-sm text-gray-500">Saldo disponível</span>
          <h2 class="text-2xl font-bold">R$ 320,00</h2>
        </div>
      </div>

      <!-- Próximos agendamentos / destaques -->
      <div class="bg-white rounded-xl p-6 shadow-sm">
        <h3 class="text-lg font-semibold mb-3">Próximos atendimentos</h3>
        <ul class="divide-y">
          <li class="py-3 flex justify-between">
            <span>Cliente: João Silva</span>
            <span>15:00h</span>
          </li>
          <li class="py-3 flex justify-between">
            <span>Cliente: Marina Lopes</span>
            <span>16:30h</span>
          </li>
        </ul>
      </div>

      <!-- Ações rápidas -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <button class="rounded-xl bg-gray-100 p-5 text-center hover:bg-gray-200 transition">
          📅 <br />
          <span class="text-sm">Agenda</span>
        </button>
        <button class="rounded-xl bg-gray-100 p-5 text-center hover:bg-gray-200 transition">
          ✏️ <br />
          <span class="text-sm">Editar Perfil</span>
        </button>
        <button class="rounded-xl bg-gray-100 p-5 text-center hover:bg-gray-200 transition">
          ⭐ <br />
          <span class="text-sm">Avaliações</span>
        </button>
        <button class="rounded-xl bg-gray-100 p-5 text-center hover:bg-gray-200 transition">
          💬 <br />
          <span class="text-sm">Mensagens</span>
        </button>
      </div>

    </div>
  </AppLayout>
</template>
