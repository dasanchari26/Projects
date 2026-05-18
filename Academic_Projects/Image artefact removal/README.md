# Image artefact removal using Deep Learning

## Description
Final year university project investigating the effectiveness of deep learning approaches for image compression artefact removal. 
JPEG and other lossy compression formats introduce visual artefacts — blocking, ringing, and blurring — that degrade image quality. T
his project evaluates and compares four deep learning approaches to blind image artefact removal, ranging from GANs to residual CNNs, across both Python/TensorFlow and MATLAB environments.

## Implemented Models
1. GAN + PatchGAN Discriminator
A generative adversarial network trained to map artefact-corrupted greyscale images to clean reconstructions. The PatchGAN discriminator evaluates realism at the patch level rather than globally, encouraging sharper local texture recovery.
2. Residual GAN + PatchGAN Discriminator
A residual variant of the above — instead of learning the clean image directly, the generator learns to predict the artefact noise itself, which is then subtracted from the input. This residual formulation often leads to more stable training and better preservation of image structure.
3. Residual AR-CNN (MATLAB)
A reimplementation and extension of the AR-CNN architecture from:
Yu, K., Dong, C., Loy, C. C., & Tang, X. — "Deep Convolution Networks for Compression Artefacts Reduction"
The residual modification replaces the original direct-mapping design with a skip-connection approach, enabling the network to focus on high-frequency artefact components.

## Tech Stack
Python
TensorFlow
NumPy
MATLAB

## Techniques Explored
Conditional GANs
PatchGAN discriminators
Residual learning
CNN-based image restoration
Compression artefact suppression
Model Evaluation: PSNR, SSIM