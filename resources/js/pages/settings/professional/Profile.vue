<script setup lang="ts">
import { Head, Link, useForm, usePage, router } from '@inertiajs/vue3';
import { ref } from 'vue';

import InputError from '@/components/InputError.vue';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem, type User, type Professional } from '@/types';

interface Props {
    mustVerifyEmail: boolean;
    status?: string;
}

defineProps<Props>();

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Configurações do perfil',
        href: '/settings/profile',
    },
];

const page = usePage();
const user = page.props.auth.user as User;
const professional = page.props.professional as Professional;
const viewEdit = ref(false);
const successMessage = ref(false);

const form = useForm({
    name: user.name,
    email: user.email,
    bio: professional.bio,
    professionalId: professional.id
});

const submit = () => {
    form.patch(route('professional.profile.update'), {
        preserveScroll: true,
        onSuccess: () => {
            viewEdit.value = false;

            user.name = form.name;
            user.email = form.email;
            professional.bio = form.bio;

            successMessage.value = true;

            setTimeout(() => {
                successMessage.value = false;
            }, 4000); // 4 segundos
        },
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">

        <Head title="Configurações do Perfil" />

        <div class="row m-3">
            <div class="col-sm-12 p-3">


                <!--Imagem do perfil-->
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <img class="rounded-circle" width="100" height="100"
                            src="https://ui-avatars.com/api/?name=Amanda+Pereira&background=0D8ABC&color=fff"
                            alt="Foto de perfil" />
                    </div>
                </div>

                <!-- Informações do perfil -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row mb-3">
                            <div class="col-sm-12 d-flex justify-content-between align-items-center">
                                <div v-if="!viewEdit">
                                    <p>{{ user.name }}</p>
                                </div>
                                <div v-else>
                                    <Label for="name">Nome</Label>
                                    <Input id="name" class="form-control mb-2" v-model="form.name" rows="4"
                                        placeholder="Informe seu nome"></Input>
                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>
                                <button v-if="!viewEdit" @click="viewEdit = !viewEdit" class="btn btn-secondary">Editar
                                    perfil</button>
                                <button v-else type="button" class="btn btn-success" @click="submit"
                                    :disabled="form.processing">Salvar</button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div v-if="!viewEdit">
                                    <p>{{ professional.bio }}</p>
                                </div>
                                <div v-else>
                                    <Label for="bio">Biografia</Label>
                                    <textarea id="bio" class="form-control mb-2" v-model="form.bio" rows="4"
                                        placeholder="Escreva sua biografia"></textarea>
                                    <InputError class="mt-2" :message="form.errors.bio" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-secondary">Ingressou em: {{ professional.created_at }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <Transition enter-active-class="transition ease-out duration-300"
                                    enter-from-class="opacity-0" enter-to-class="opacity-100"
                                    leave-active-class="transition ease-in duration-300" leave-from-class="opacity-100"
                                    leave-to-class="opacity-0">
                                    <div v-if="successMessage" class="alert alert-success mt-2" role="alert">
                                        Perfil atualizado com sucesso!
                                    </div>
                                </Transition>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- 
            TODO: Adicionar opção de deletar conta e editar email e senha.
            -->
        </div>
    </AppLayout>
</template>
