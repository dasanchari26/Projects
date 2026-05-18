function test_model(net)

myFolder='..\Data\CBSD68-dataset\CBSD68\original';
myFiles = dir(fullfile('..\Data\CBSD68-dataset\CBSD68\original','*.jpg'));
avg_ssim_original = zeros(68,6);
avg_ssim_model = zeros(68,6);
avg_psnr_original = zeros(68,6);
avg_psnr_model = zeros(68,6);
avg_niqe_original = zeros(68,6);
avg_niqe_model = zeros(68,6);
avg_brisque_original = zeros(68,6);
avg_brisque_model = zeros(68,6);

for k = 1:length(myFiles)
    baseFileName = myFiles(k).name;
    fullFileName = fullfile(myFolder, baseFileName);
    Ireference = imread(fullFileName);
    fprintf(1, 'Now reading %s\n', fullFileName);
    
    imwrite(Ireference,fullfile(tempdir,'testQuality5.jpg'),'Quality',5);
    imwrite(Ireference,fullfile(tempdir,'testQuality10.jpg'),'Quality',10);
    imwrite(Ireference,fullfile(tempdir,'testQuality15.jpg'),'Quality',15);
    imwrite(Ireference,fullfile(tempdir,'testQuality25.jpg'),'Quality',25);
    imwrite(Ireference,fullfile(tempdir,'testQuality35.jpg'),'Quality',35);
    imwrite(Ireference,fullfile(tempdir,'testQuality50.jpg'),'Quality',50);

    I5 = imread(fullfile(tempdir,'testQuality5.jpg'));
    I10 = imread(fullfile(tempdir,'testQuality10.jpg'));
    I15 = imread(fullfile(tempdir,'testQuality15.jpg'));
    I25 = imread(fullfile(tempdir,'testQuality25.jpg'));
    I35 = imread(fullfile(tempdir,'testQuality35.jpg'));
    I50 = imread(fullfile(tempdir,'testQuality50.jpg'));
    %imshow(I15)
    I5ycbcr = rgb2ycbcr(I5);
    I10ycbcr = rgb2ycbcr(I10);
    I15ycbcr = rgb2ycbcr(I15);
    I25ycbcr = rgb2ycbcr(I25);
    I35ycbcr = rgb2ycbcr(I35);
    I50ycbcr = rgb2ycbcr(I50);

    I5y_predicted = denoiseImage(I5ycbcr(:,:,1),net);
    I10y_predicted = denoiseImage(I10ycbcr(:,:,1),net);
    I15y_predicted = denoiseImage(I15ycbcr(:,:,1),net);
    I25y_predicted = denoiseImage(I25ycbcr(:,:,1),net);
    I35y_predicted = denoiseImage(I35ycbcr(:,:,1),net);
    I50y_predicted = denoiseImage(I50ycbcr(:,:,1),net);

    I5ycbcr_predicted = cat(3,I5y_predicted,I5ycbcr(:,:,2:3));
    I10ycbcr_predicted = cat(3,I10y_predicted,I10ycbcr(:,:,2:3));
    I15ycbcr_predicted = cat(3,I15y_predicted,I15ycbcr(:,:,2:3));
    I25ycbcr_predicted = cat(3,I25y_predicted,I25ycbcr(:,:,2:3));
    I35ycbcr_predicted = cat(3,I35y_predicted,I35ycbcr(:,:,2:3));
    I50ycbcr_predicted = cat(3,I50y_predicted,I50ycbcr(:,:,2:3));

    I5_predicted = ycbcr2rgb(I5ycbcr_predicted);
    I10_predicted = ycbcr2rgb(I10ycbcr_predicted);
    I15_predicted = ycbcr2rgb(I15ycbcr_predicted);
    I25_predicted = ycbcr2rgb(I25ycbcr_predicted);
    I35_predicted = ycbcr2rgb(I35ycbcr_predicted);
    I50_predicted = ycbcr2rgb(I50ycbcr_predicted);
    %figure, imshow(I15_predicted)
    [ssim_original, ssim_model, psnr_original, psnr_model, niqe_original, niqe_model, brisque_original, brisque_model] = MydisplayJPEGResults(Ireference,I5,I10,I15,I25,I35,I50,I5_predicted,I10_predicted,I15_predicted,I25_predicted,I35_predicted,I50_predicted);
    avg_ssim_original(k,:) = ssim_original;
    avg_ssim_model(k,:) = ssim_model;
    avg_psnr_original(k,:) = psnr_original;
    avg_psnr_model(k,:) = psnr_model;
    avg_niqe_original(k,:) = niqe_original;
    avg_niqe_model(k,:) = niqe_model;
    avg_brisque_original(k,:) = brisque_original;
    avg_brisque_model(k,:) = brisque_model;
end    
avg_ssim_original = mean(avg_ssim_original,1);
avg_ssim_model = mean(avg_ssim_model,1);
avg_psnr_original = mean(avg_psnr_original,1);
avg_psnr_model = mean(avg_psnr_model,1);
avg_niqe_original = mean(avg_niqe_original,1);
avg_niqe_model = mean(avg_niqe_model,1);
avg_brisque_original = mean(avg_brisque_original,1);
avg_brisque_model = mean(avg_brisque_model,1);
disp('------------------------------------------')
disp('SSIM Comparison')
disp('===============')
disp(['I5: ' num2str(avg_ssim_original(1)) '    I5_predicted: ' num2str(avg_ssim_model(1))])
disp(['I10: ' num2str(avg_ssim_original(2)) '    I10_predicted: ' num2str(avg_ssim_model(2))])
disp(['I15: ' num2str(avg_ssim_original(3)) '    I15_predicted: ' num2str(avg_ssim_model(3))])
disp(['I25: ' num2str(avg_ssim_original(4)) '    I25_predicted: ' num2str(avg_ssim_model(4))])
disp(['I35: ' num2str(avg_ssim_original(5)) '    I35_predicted: ' num2str(avg_ssim_model(5))])
disp(['I50: ' num2str(avg_ssim_original(6)) '    I50_predicted: ' num2str(avg_ssim_model(6))])
disp('------------------------------------------')
disp('PSNR Comparison')
disp('===============')
disp(['I5: ' num2str(avg_psnr_original(1)) '    I5_predicted: ' num2str(avg_psnr_model(1))])
disp(['I10: ' num2str(avg_psnr_original(2)) '    I10_predicted: ' num2str(avg_psnr_model(2))])
disp(['I15: ' num2str(avg_psnr_original(3)) '    I15_predicted: ' num2str(avg_psnr_model(3))])
disp(['I25: ' num2str(avg_psnr_original(4)) '    I25_predicted: ' num2str(avg_psnr_model(4))])
disp(['I35: ' num2str(avg_psnr_original(5)) '    I35_predicted: ' num2str(avg_psnr_model(5))])
disp(['I50: ' num2str(avg_psnr_original(6)) '    I50_predicted: ' num2str(avg_psnr_model(6))])
disp('------------------------------------------')
disp('NIQE Comparison')
disp('===============')
disp(['I5: ' num2str(avg_niqe_original(1)) '    I5_predicted: ' num2str(avg_niqe_model(1))])
disp(['I10: ' num2str(avg_niqe_original(2)) '    I10_predicted: ' num2str(avg_niqe_model(2))])
disp(['I15: ' num2str(avg_niqe_original(3)) '    I15_predicted: ' num2str(avg_niqe_model(3))])
disp(['I25: ' num2str(avg_niqe_original(4)) '    I25_predicted: ' num2str(avg_niqe_model(4))])
disp(['I35: ' num2str(avg_niqe_original(5)) '    I35_predicted: ' num2str(avg_niqe_model(5))])
disp(['I50: ' num2str(avg_niqe_original(6)) '    I50_predicted: ' num2str(avg_niqe_model(6))])
disp('------------------------------------------')
disp('BRISQUE Comparison')
disp('==================')
disp(['I5: ' num2str(avg_brisque_original(1)) '    I5_predicted: ' num2str(avg_brisque_model(1))])
disp(['I10: ' num2str(avg_brisque_original(2)) '    I10_predicted: ' num2str(avg_brisque_model(2))])
disp(['I15: ' num2str(avg_brisque_original(3)) '    I15_predicted: ' num2str(avg_brisque_model(3))])
disp(['I25: ' num2str(avg_brisque_original(4)) '    I25_predicted: ' num2str(avg_brisque_model(4))])
disp(['I35: ' num2str(avg_brisque_original(5)) '    I35_predicted: ' num2str(avg_brisque_model(5))])
disp(['I50: ' num2str(avg_brisque_original(6)) '    I50_predicted: ' num2str(avg_brisque_model(6))])

