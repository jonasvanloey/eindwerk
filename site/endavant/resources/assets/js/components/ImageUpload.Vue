<template>
    <div>
        <div>
            <p>Profielfoto</p>
        </div>
        <div class="image-box">
            <img v-if="source !== ''" id="image" :src="source" ref="image" class="image-box">
            <div v-else class="image-placeholder"></div>
        </div>
        <div class="image-buttons">
            <label class="btn btn-default btn-file">
                Browse <input type="file" style="display: none;" @change="saveFile" id="image-file" ref="imageFile">
            </label>
            <button type="button" class="btn btn-primary" @click="uploadFile">Opslaan</button>
        </div>
    </div>
</template>

<script>
    import Cropper from "cropperjs";
    import axios from "axios";

    export default {
        props: {
            path: "",
            resource: "",
            keyName: "",
            aspectRatio: 0.0
        },
        data() {
            return {
                source: this.path,
                cropData: {},
                imageFile: {},
                cropper: {},
                contData:{}
            };
        },
        methods: {
            saveFile() {
                const file = this.$refs.imageFile.files[0];
                this.file = file;
                this.source = window.URL.createObjectURL(file);
                setTimeout(() => {
                    this.loadCropper();
            }, 200);
            },
            loadCropper() {
                const image = this.$refs.image;
                this.cropper = new Cropper(image, {
                    checkCrossOrigin: false,
                    aspectRatio: this.aspectRatio,
                    ready: function () {
                        this.contData = this.cropper.getImageData();
                        this.cropper.setCropBoxData({ height: this.contData.height, width: this.contData.width  });
                        this.cropper.crop();
                    }
                });


            },
            uploadFile() {
                const canvas = this.cropper.getCroppedCanvas();
                const raw = canvas.toDataURL();
                axios
                        .post("image", {
                            image: raw,
                            key: this.keyName,
                            resource: this.resource
                        })
                        .then(res => {
                            console.log(res);
                    const url = res.data.url;
                this.source = url;
                this.cropper.destroy();
            }).catch(error =>{
                console.log(error.reponse);
                });
            }
        },
        mounted() {}
    };
</script>
<style>
    .image-box {
        margin-top: 0.5em;
        max-height: 250px;
        max-width: 250px;
        display: block;
    }

    .image-placeholder {
        width: 250px;
        height: 250px;
        background: grey;
    }

    .image-buttons {
        margin-top: 1em;
        margin-bottom: 1em;
        display: block;
    }
</style>