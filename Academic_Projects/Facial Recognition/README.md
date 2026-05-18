Facial Recognition using Principal Component Analysis

This project explores facial recognition using Principal Component Analysis (PCA) and deep learning techniques for dimensionality reduction, feature extraction, and face classification.

The objective is to investigate how PCA-based feature compression can be applied to facial recognition while maintaining recognition accuracy under varying image conditions.

Project Pipeline
1. Data Preprocessing

Input images undergo several preprocessing stages to improve consistency and model robustness:

grayscale conversion to reduce computational complexity
image resizing and scaling to standardize facial dimensions
brightness normalization
image rotation augmentation to improve rotational robustness
2. Face Detection

Faces are detected using the OpenCV Haar Cascade classifier.

To improve detection reliability:

images are evaluated at multiple rotations
scaling is applied during detection
3. PCA-based Facial Recognition

PCA is applied with:

n = 32 principal components

The algorithm projects facial images into a lower-dimensional eigenspace while preserving the directions of highest variance within the dataset.

Recognition is performed by:

comparing projected feature vectors
experimentally determining a distance threshold for unknown-face classification

The system supports:

still-image recognition
real-time webcam/video capture recognition
Deep Learning Extension

A convolutional neural network (CNN) is trained using PCA-transformed facial representations to evaluate whether learned nonlinear feature extraction improves classification performance compared to classical PCA-based recognition alone.

The deep learning implementation reuses the same preprocessing pipeline and validates performance on still-image facial recognition tasks.