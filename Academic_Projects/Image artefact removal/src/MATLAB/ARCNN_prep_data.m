%script for loading training data
function [dsTrain] = ARCNN_prep_data(precompressed)
imagesDir='..\Data\20000_images_train';

%gets a small subset of the 20000 image folder (~530 images)
if precompressed == false
    trainImagesDir = fullfile(imagesDir,'iaprtc12','images','01');
    exts = {'.jpg','.bmp','.png'};
    imdsPristine = imageDatastore(trainImagesDir,'FileExtensions',exts);
    JPEGQuality = [5:5:40 50 60 70 80];

    %Create Random Patch Extraction Datastore for Training
    compressedImagesDir = fullfile(imagesDir,'iaprtc12','JPEGDeblockingData','compressedImages');
    residualImagesDir = fullfile(imagesDir,'iaprtc12','JPEGDeblockingData','residualImages');
    %creates RGB dataset of the different JPEG Qualities in the form of
    %.jpg files and Y channel .mat files
    [compressedDirName,residualDirName] = createJPEGDeblockingTrainingSet(imdsPristine,JPEGQuality);
else 
    compressedDirName = '..\Data\20000_images_train\iaprtc12\images\01\compressedImages';
    residualDirName = '..\Data\20000_images_train\iaprtc12\images\01\residualImages';
end

imdsCompressed = imageDatastore(compressedDirName,'FileExtensions','.mat','ReadFcn',@matRead);
imdsResidual = imageDatastore(residualDirName,'FileExtensions','.mat','ReadFcn',@matRead);
augmenter = imageDataAugmenter( ...
    'RandRotation',@()randi([0,1],1)*90, ...
    'RandXReflection',true);

patchSize = 50; 
patchesPerImage = 10;
dsTrain = randomPatchExtractionDatastore(imdsCompressed,imdsResidual,patchSize, ...
    'PatchesPerImage',patchesPerImage, ...
    'DataAugmentation',augmenter);

dsTrain.MiniBatchSize = patchesPerImage;
inputBatch = preview(dsTrain);
disp(inputBatch)