%script for loading training data
function [dsTrain] = prep_test_data(precompressed)
addpath('..\References\JPEGImageDeblockingDeepLearningExample')
imagesDir= '..\Data\Predicted_images\Actual_extended';
%imagesDir='..\Data\CBSD68-dataset\CBSD68\original';
%myFiles = dir(fullfile('..\Data\CBSD68-dataset\CBSD68\original','*.jpg'));
%imagesDir='..\Data\20000_images_train';
%gets a small subset of the 20000 image folder (~530 images)
if precompressed == false
    trainImagesDir = fullfile(imagesDir);
    exts = {'.jpg','.bmp','.png'};
    imdsPristine = imageDatastore(trainImagesDir,'FileExtensions',exts);
    JPEGQuality = [40 50 60 70 80];

    %Create Random Patch Extraction Datastore for Training
    compressedImagesDir = fullfile(imagesDir,'compressedImages');
    residualImagesDir = fullfile(imagesDir,'residualImages');
    [compressedDirName,residualDirName] = createJPEGDeblockingTrainingSet(imdsPristine,JPEGQuality);
else 
    compressedDirName = '..\Data\20000_images_train\iaprtc12\images\01\compressedImages';
    residualDirName = '..\Data\20000_images_train\iaprtc12\images\01\residualImages';
end



imdsCompressed = imageDatastore(compressedDirName,'FileExtensions','.mat','ReadFcn',@matRead, 'LabelSource', 'foldernames');
imdsResidual = imageDatastore(residualDirName,'FileExtensions','.mat','ReadFcn',@matRead, 'LabelSource', 'foldernames');

augmenter = imageDataAugmenter( ...
    'RandRotation',@()randi([0,1],1)*90, ...
    'RandXReflection',true);

patchSize = 32;%50 previously
patchesPerImage = 10;%5 previously
dsTrain = randomPatchExtractionDatastore(imdsCompressed,imdsResidual,patchSize, ...
    'PatchesPerImage',patchesPerImage, ...
    'DataAugmentation',augmenter);