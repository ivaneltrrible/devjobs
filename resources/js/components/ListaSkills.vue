<template>
    <div>
        <ul class="flex flex-wrap justify-center">
            <li class="rounded border border-gray-500 px-10 py-3 mb-3 mr-2" v-for="(skill, i) in this.skills" v-bind:key="i"
            @click="activar($event)"
            :class="verificarClaseActiva(skill)"
            >{{skill}}</li>
        </ul>
        <input type="hidden" name="skills" id="skills">
    </div>
</template>
<script>
    export default {
        props: ['skills', 'oldskills'],
        mounted() {
            document.querySelector('#skills').value = this.oldskills;
        },
        created: function(){
            if (this.oldskills) {
                const skillsArray = this.oldskills.split(',');
                skillsArray.forEach(skill => this.habilidades.add(skill));
            }
        },
        data: function() {
            return {
                habilidades: new Set()
            }
        },
        methods: {

            //====== activar- Cambiar de color el background del elemento seleccionado =======
            activar(e) {
                //console.log('diste click al elemento' , e.target.textContent)
                if ( e.target.classList.contains('bg-teal-500') ) {
                    e.target.classList.remove('bg-teal-500');

                    //Retirar la habilidad del arreglo de Habilidades
                    this.habilidades.delete(e.target.textContent)
                }else{
                    e.target.classList.add('bg-teal-500');

                    //Agregar al arreglo de habilidades la hablidad que selecciono el usuario
                    this.habilidades.add(e.target.textContent);
                }

                //==== Agregar al input hidden las habilidades para enviar al servidor
                //Convertir el set de habilidades to strings
                const stringHablidades = [...this.habilidades];
                document.querySelector('#skills').value = stringHablidades;
            },
            verificarClaseActiva(skill){
                return this.habilidades.has(skill) ? 'bg-teal-400' : '' ;
            }
        },
    }
</script>