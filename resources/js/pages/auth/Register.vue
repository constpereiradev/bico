<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    type: '',
    bio: '',
    average_price: '',
    category_id: '',
    profile_picture: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AuthBase title="Crie uma conta" description="Informe as credenciais abaixo para criar uma nova conta">

        <Head title="Register" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="type">Tipo de usuário</Label>
                    <select v-model="form.type" class="form-select border" id="inputGroupSelect01">
                        <option value="client">Cliente</option>
                        <option value="professional">Profissional</option>
                    </select>
                    <InputError :message="form.errors.type" />
                </div>

                <div v-if="form.type == 'professional'" class="row mb-3">
                    <div class="col-sm-12">
                        <div class="grid gap-6">
                            <div class="grid gap-2">
                                <Label for="bio">Bio</Label>
                                <Input id="bio" type="text" autofocus :tabindex="1" autocomplete="bio"
                                    v-model="form.bio" placeholder="Bio" />
                                <InputError :message="form.errors.bio" />
                            </div>

                            <div class="grid gap-2">
                                <Label for="average_price">Preço/hora</Label>
                                <Input id="average_price" type="number" autofocus :tabindex="1" autocomplete="average_price"
                                    v-model="form.average_price" placeholder="45" />
                                <InputError :message="form.errors.average_price" />
                            </div>

                            <div class="grid gap-2">
                                <Label for="category_id">Categoria Id</Label>
                                <Input id="category_id" type="number" autofocus :tabindex="1" autocomplete="category_id"
                                    v-model="form.category_id" placeholder="Nome completo" />
                                <InputError :message="form.errors.category_id" />
                            </div>

                            <div class="grid gap-2">
                                <Label for="profile_picture">Foto perfil</Label>
                                <Input id="profile_picture" type="text" autofocus :tabindex="1" autocomplete="profile_picture"
                                    v-model="form.profile_picture" placeholder="Nome completo" />
                                <InputError :message="form.errors.profile_picture" />
                            </div>
                        </div>
                    </div>

                </div>



                <div class="grid gap-2">
                    <Label for="name">Nome</Label>
                    <Input id="name" type="text" required autofocus :tabindex="1" autocomplete="name"
                        v-model="form.name" placeholder="Nome completo" />
                    <InputError :message="form.errors.name" />
                </div>

                <div class="grid gap-2">
                    <Label for="email">E-mail</Label>
                    <Input id="email" type="email" required :tabindex="2" autocomplete="email" v-model="form.email"
                        placeholder="email@exemplo.com" />
                    <InputError :message="form.errors.email" />
                </div>

                <div class="grid gap-2">
                    <Label for="password">Senha</Label>
                    <Input id="password" type="password" required :tabindex="3" autocomplete="new-password"
                        v-model="form.password" placeholder="Senha" />
                    <InputError :message="form.errors.password" />
                </div>

                <div class="grid gap-2">
                    <Label for="password_confirmation">Confirme a senha</Label>
                    <Input id="password_confirmation" type="password" required :tabindex="4" autocomplete="new-password"
                        v-model="form.password_confirmation" placeholder="Confirme a senha" />
                    <InputError :message="form.errors.password_confirmation" />
                </div>

                <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Criar conta
                </Button>
            </div>

            <div class="text-center text-sm text-muted-foreground">
                Já tem uma conta?
                <TextLink :href="route('login')" class="underline underline-offset-4" :tabindex="6">Entrar</TextLink>
            </div>
        </form>
    </AuthBase>
</template>
